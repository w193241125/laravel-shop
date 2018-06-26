<?php

return [
    'alipay' => [
        'app_id'         => '2016091400506701',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq10cf8RzOWh5Dur2Q7gI8b5GCzdgKnpqk5pq32DPThxTSMHExnfqsuF1lJQkE7wk6zhARowqSyMY22x3/iYOOLWzQsqvovX7kLbW8QQ1bdo3/FdGTTNp5MCRNAoNqFne32FYoXAloqIMHoXMP3i7wOXDoWO1SVFgOOTFAW/LY7X0vfFzJr7Hn3k00iVo3C7UPk0jGBMwcKHkMtkhqDAJGYRR5qC6B1tUxt9dPf9NYe/EbkwY9LAHLYyIpuBkESN8POaBDy+8gKdBPzR91z/JGvhR07x7KLXSh5EKmjn+Mc8Aq2aOn6eqMW2yOr8YZsmutcTEvyIkucZCcY0Qj9v9ywIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEAy7JLHVMkHpiBe/KMwHx46YRaHtQJRjM7QFi7E2Sio57muXe/9a/iMt9GIfMS3WkldLPozUXnKLjkLp+eVMyAGpRtIJg/wynkNc3h+41+qb0tfO3LcaUbJ1Cu58WTKNURPtUMhB15lhIzrnS1O8EsvaEbRc/MZayflXfWJsX8YB8Rw+JyTT9aFZk48ktodkOjaVWohbfm0QaVxcLPkNP/tUJQ2r59KrWySWIo2q3Nx/LPGk0SM+pn5X22m+zDO3H9NimbrOsQk4LLBse6CvDaYzfdLE1Lm0BtfuI1qsHR4OFwEdTl0GezqcImqPZB1HcjexH6IJMyPMbJbmt+0OhcVQIDAQABAoIBADsBIpEUDFpwgtGMqQj5BW1fUVuswCL9pCQ3j7lGZXZQCTWgYpKgqD1kP8SFzOkmFBuCIeWUYimBpVd8FTkrI9CPPi067P1znQ+Y2+UqT46LpimSGGSLFxqEXKX2rXIehihVPpLmltnJ2/6k//qXMoabrHLEhsjNAE0jsXz5zOlqkf1ne/Azc4YYUh+0t3WAxmHs8Rl2OixGptMT78MtxdfeT5RL27p+iygDnmRCwyLqeK9bgR3Ec91mlZKD/ACJef8Rg8SL+P7eOq0MfGzkWseX9IS0v48Fl+1iuV/UlviF3yJ0zzJedhuahTi67Kf6tr4emiu62vguhEY9sdE5MgECgYEA8+Vo+AJK2uYYrXba5/CODpF7hLgKD9CubMalJzGG0MiX2DXQMNft/569tvsqfMcNUkTIjX9qfSrGZdfMPrxqtoDeZ6qUCJFCxOYaUEuYWHDt8EoJYdx5GzSsQQczhDUDoYWNm9DCN6xupI1ii+lJ+3jPuab1KT/yjl330Ri8gcUCgYEA1c4qKuWp5rrU54D0/YaRtnclgeWHmehGpEfKOlilamX5qbHUg7AsfWSlAXajQdLdId3El8hh53fMGKdNTtGXQyQKHPLqpQtSjvvLKwzmssNS7owNRKMzG6mKjO5zx/BOHWdwJ0WxPKLOX28uqXknx4110JJcrVs0SsApkGP76VECgYEAoxdVCgL+a0JSXiyMVWzWkYdXQXiPweOZv8NVzM+hhxub7kiN3xuFWtmbozBxSN8SWWEFexko7GoeIRwcyBbWhRPHpSq7sr7wFxqHngnu5bUeZwAbJgV4NmkShql6GX4Z33ifKQJ/3RrBIegpbcWiYzZ2MX8jkWHhoLHVdU1FQMECgYEAmBkICmhDS66Rkvc8UbcPpbxw5E2C/8wrpOalSIiTdHOC/mNRiTUlETct4zKgxUzanyMCne+hJmckvE0YQ//6GXtj7mAo6Kx7WNhrGf8dhwJI1wau0as/ymf79nITz6J2D5jsQiPkB/zRzzZq/YkA8YcCzxOv9msxchPt/ZgDN2ECgYEA611flh8lx5qDhlzzmFrBS1EE11AW6Ptp1PTwZ3LE/KACpp9Uh39qulgMJJvfxhw0BMdaL3qaj8LKBb4Az4TjJyS3PYpjt2apdZrJ1TO3MLQRK71tVBDwkG+IS4J6v/rHDn9PaN0NI4FUr4gK5hrh6W6H/7A1FFr4PZHdEBl99GA=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];