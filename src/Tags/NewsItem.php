<?php

namespace Spatie\Sitemap\Tags;

class NewsItem
{
    public string $publication_name;
    public string $publication_lang;

    public string $title;

    public string $publication_date;

    public static function create(string $publication_name, string $publication_lang, string $title, string $publication_date): static
    {
        return new static($publication_name, $publication_lang, $title, $publication_date);
    }

    public function __construct(string $publication_name, string $publication_lang, string $title, string $publication_date)
    {
        $this->setPublicationName($publication_name);
        $this->setPublicationLang($publication_lang);
        $this->setTitle($title);
        $this->setPublicationDate($publication_date);
    }

    public function setPublicationName(string $publication_name): static
    {
        $this->publication_name = $publication_name;

        return $this;
    }

    public function setPublicationLang(string $publication_lang): static
    {
        $this->publication_lang = $publication_lang;

        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function setPublicationDate(string $publication_date): static
    {
        $this->publication_date = $publication_date;

        return $this;
    }
}
