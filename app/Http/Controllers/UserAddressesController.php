<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    public function index(Request $request)
    {
        return view('user_addresses.index', [
            'addresses' => $request->user()->addresses,
        ]);
    }

    //新增
    public function create()
    {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }


    public function store(UserAddressRequest $request)
    {
        /**
         * Laravel 会自动调用 UserAddressRequest 中的 rules() 方法获取校验规则来对用户提交的数据进行校验，
         * 因此这里我们不需要手动调用 $this->validate() 方法。
         * $request->user() 获取当前登录用户。
         * user()->addresses() 获取当前用户与地址的关联关系（注意：这里并不是获取当前用户的地址列表）
         * addresses()->create() 在关联关系里创建一个新的记录。
         * $request->only() 通过白名单的方式从用户提交的数据里获取我们所需要的数据。
         *
         */
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        // 跳转回我们的地址列表页面。
        return redirect()->route('user_addresses.index');
    }
    //编辑
    public function edit(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);

        return view('user_addresses.create_and_edit', ['address' => $user_address]);
    }
    //提交编辑并更新
    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $this->authorize('own', $user_address);

        $user_address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    //删除
    public function destroy(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);

        $user_address->delete();
        // 把之前的 redirect 改成返回空数组
        return [];
    }
}
