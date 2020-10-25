<?php

namespace Kiora\EverialBundle\Message;

class Recognize
{
    private \SplFileObject $file;
    private string $rafIf;
    private string $dbId;

    public function __construct(\SplFileObject $file, array $reponse)
    {
        $this->file = $file;
        $this->rafIf = $reponse['radId'];
        $this->dbId = $reponse['dbId'];
    }

    public function getFile(): \SplFileObject
    {
        return $this->file;
    }

    public function getRafIf(): string
    {
        return $this->rafIf;
    }

    public function getDbId(): string
    {
        return $this->dbId;
    }
}
