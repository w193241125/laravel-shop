<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Cache;
use Illuminate\Support\Str;

class EmailVerificationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     * 我们只需要通过邮件通知，因此这里只需要一个 mail 即可
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //使用 laravel 内置的 Str 类生产随机字符串的函数，参数就是要生成的字符串长度
        $token = Str::random(16);
        //往缓存中写入这个随机字符串，有效时间为 1800 秒。
        Cache::set('email_verification_'.$notifiable->email, $token, 1800);
        $url = route('email_verification.verify', ['email'=>$notifiable->email, 'token'=>$token]);
        return (new MailMessage)
                    ->greeting($notifiable->name.'您好：')
                    ->subject('注册成功，请验证您的邮箱')
                    ->line('请点击下方链接验证您的邮箱.')
                    ->action('验证', $url)
                    ->line('感谢!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
