<?php

namespace App\Domains\Model;

use InvalidArgumentException;
use Livewire\Wireable;

class ChatMessage implements Wireable
{
    public string $role;

    public string $message;

    public function __construct(
        string $role,
        string $message
    ) {
        $this->role = $role;
        $this->message = $message;
    }

    /**
     * NOTE: プロパティをprivateにすると，Getter/Setterがあってもその後取り出せなくなる
     * stdClassにはメソッドが存在しないため
     */
//    /**
//     * @return string
//     */
//    public function getRole(): string
//    {
//        return $this->role;
//    }
//
//    /**
//     * @param string $role
//     */
//    public function setRole(string $role): void
//    {
//        $this->role = $role;
//    }
//
//    /**
//     * @return string
//     */
//    public function getMessage(): string
//    {
//        return $this->message;
//    }
//
//    /**
//     * @param string $message
//     */
//    public function setMessage(string $message): void
//    {
//        $this->message = $message;
//    }

    public function toLivewire()
    {
        return $this;
    }

    public static function fromLivewire($value)
    {
        return new static($value);
    }
}
