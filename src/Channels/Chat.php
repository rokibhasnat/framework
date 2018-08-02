<?php

declare(strict_types=1);

namespace FondBot\Channels;

class Chat
{
    public const TYPE_PRIVATE = 'private';
    public const TYPE_GROUP = 'group';

    private $id;
    private $title;
    private $type;

    protected function __construct(string $id, string $title = null, string $type = self::TYPE_PRIVATE)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
    }

    public static function make(string $id, string $title = null, string $type = self::TYPE_PRIVATE)
    {
        return new static($id, $title, $type);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
