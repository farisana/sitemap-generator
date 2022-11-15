<?php

namespace Spatie\Sitemap\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class Url extends Tag
{
    const CHANGE_FREQUENCY_ALWAYS = 'always';
    const CHANGE_FREQUENCY_HOURLY = 'hourly';
    const CHANGE_FREQUENCY_DAILY = 'daily';
    const CHANGE_FREQUENCY_WEEKLY = 'weekly';
    const CHANGE_FREQUENCY_MONTHLY = 'monthly';
    const CHANGE_FREQUENCY_YEARLY = 'yearly';
    const CHANGE_FREQUENCY_NEVER = 'never';

    public string $url;

    public Carbon $lastModificationDate;

    public string $changeFrequency;

    public float $priority = 0.8;

    /** @var \Spatie\Sitemap\Tags\Alternate[] */
    public array $alternates = [];

    /** @var \Spatie\Sitemap\Tags\Image[] */
    public array $images = [];

    /** @var \Spatie\Sitemap\Tags\Video[] */
    public array $videos = [];

	/** @var \Spatie\Sitemap\Tags\NewsItem[] */
	public array $news = [];

    public static function create(string $url): static
    {
        return new static($url);
    }

    public function __construct(string $url)
    {
        $this->url = $url;

        $this->lastModificationDate = Carbon::now();

        $this->changeFrequency = static::CHANGE_FREQUENCY_DAILY;
    }

    public function setUrl(string $url = ''): static
    {
        $this->url = $url;

        return $this;
    }

    public function setLastModificationDate(DateTimeInterface $lastModificationDate): static
    {
        $this->lastModificationDate = Carbon::instance($lastModificationDate);

        return $this;
    }

    public function setChangeFrequency(string $changeFrequency): static
    {
        $this->changeFrequency = $changeFrequency;

        return $this;
    }

    public function setPriority(float $priority): static
    {
        $this->priority = max(0, min($priority, 1));

        return $this;
    }

    public function addAlternate(string $url, string $locale = ''): static
    {
        $this->alternates[] = new Alternate($url, $locale);

        return $this;
    }

    public function addImage(string $url, string $caption = '', string $geo_location = '', string $title = '', string $license = ''): static
    {
        $this->images[] = new Image($url, $caption, $geo_location, $title, $license);

        return $this;
    }

	public function addVideo(string $player_loc, string $thumbnail_loc, string $title, string $description, string $publication_date, ?int $duration = 0, ?string $expiration_date = ''): static
	{
		$this->videos[] = new Video($player_loc, $thumbnail_loc, $title, $description, $publication_date, $duration, $expiration_date);

		return $this;
	}

	public function addNews(string $publication_name, string $publication_lang, string $title, string $publication_date): static
	{
		$this->news[] = new NewsItem($publication_name, $publication_lang, $title, $publication_date);

		return $this;
	}

	public function hasVideo(): bool
	{
		return !empty($this->videos);
	}

    public function path(): string
    {
        return parse_url($this->url, PHP_URL_PATH) ?? '';
    }

    public function segments(?int $index = null): array | string | null
    {
        $segments = collect(explode('/', $this->path()))
            ->filter(function ($value) {
                return $value !== '';
            })
            ->values()
            ->toArray();

        if (! is_null($index)) {
            return $this->segment($index);
        }

        return $segments;
    }

    public function segment(int $index): ?string
    {
        return $this->segments()[$index - 1] ?? null;
    }
}
