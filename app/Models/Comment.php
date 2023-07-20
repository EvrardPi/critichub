<?php
namespace App\Models;
use App\Core\SQL;

class Comment extends SQL {
    private int $id = 0;
    protected string $content;
    protected int $status;
    protected ?int $id_user;
    protected int $id_review;
    private ?string $created_at;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param string|null $created_at
     */
    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return int
     */
    public function getIdReview(): int
    {
        return $this->id_review;
    }

    /**
     * @param int $id_review
     */
    public function setIdReview(int $id_review): void
    {
        $this->id_review = $id_review;
    }

    /**
     * @return ?int
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }









}
