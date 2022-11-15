<?php

namespace Spatie\Sitemap\Tags;

class Video
{
	public string $player_loc;
	public string $thumbnail_loc;

	public string $title;

	public string $description;
	public string $duration;

	public string $expiration_date;

    public static function create(string $player_loc, string $thumbnail_loc, string $title, string $description, ?int $duration = 0, ? string $expiration_date = ''): static
    {
        return new static($player_loc, $thumbnail_loc, $title, $description, $duration, $expiration_date);
    }

    public function __construct(string $player_loc, string $thumbnail_loc, string $title, string $description, ?int $duration = 0, ? string $expiration_date = '')
    {
		$this->setPlayerLoc($player_loc);
		$this->setThumbnailLoc($thumbnail_loc);
		$this->setTitle($title);
		$this->setDescription($description);

		$this->setDuration($duration);
		$this->setExpirationDate($expiration_date);
    }

	public function setPlayerLoc(string $player_loc): static
	{
		$this->player_loc = $player_loc;
		return $this;
	}

	public function setThumbnailLoc(string $thumbnail_loc): static
	{
		$this->thumbnail_loc = $thumbnail_loc;
		return $this;
	}

	public function setTitle(string $title): static
	{
		$this->title = $title;
		return $this;
	}

	public function setDescription(string $description): static
	{
		$this->description = $description;
		return $this;
	}

	public function setDuration(string $duration): static
	{
		$this->duration = $duration;
		return $this;
	}

	public function setExpirationDate(string $expiration_date): static
	{
		$this->expiration_date = $expiration_date;
		return $this;
	}
}
