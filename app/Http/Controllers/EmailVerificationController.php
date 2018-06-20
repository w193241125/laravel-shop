<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Http\Request;
use Mockery\Exception;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        //从 url 中获取 `email` 和 `token` 两个参数
        $email = $request->input('email');
        $token = $request->input('token');

        //如果有一个为空，说明不是一个合法的验证链接，直接抛出异常
        if (!$token || !$email){
            throw new InvalidRequestException('验证链接有误');
        }

        //从缓存中读取数据，我们把从 url 中获取的 `token` 与缓存中的值作对比
        //如果缓存不存在或者返回的值与 url 中的 `token` 不一致，就抛出异常
        if ($token != Cache::get('email_verification_'.$email)){
            throw new InvalidRequestException('验证链接有误或者已过期');
        }

        //根据邮箱从数据库中获取对应的用户
        //通常来说能通过 token 验证的情况下不可能出现用户不存在
        //但为了代码的健壮性，我们还是需要做这个判断
        if (!$user = User::where('email', $email)->first()){
            throw new InvalidRequestException('用户不存在');
        }

        //将指定的 key 从缓存中删除，由于已经完成了验证，这个缓存就没有必要再保留。
        Cache::forget('email_verification_'.$email);
        //最关键的，要把对应用户的 `email_verified` 字段改为 `true`
        $user->update(['email_verified'=>true]);

        //最后通知用户验证成功
        return view('pages.success', ['msg'=>'邮箱验证成功']);
    }

    public function send(Request $request)
    {
        $user = $request->user();
        // 判断用户是否已经激活
        if ($user->email_verified) {
            throw new InvalidRequestException('你已经验证过邮箱了');
        }
        // 调用 notify() 方法用来发送我们定义好的通知类
        $user->notify(new EmailVerificationNotification());

        return view('pages.success', ['msg' => '邮件发送成功']);
    }
}
