<?php

namespace Assignment03\Solution2;

use Carbon\Carbon;

final class Tweet
{
    private $id;
    private $tweetedAt;

    public function __construct(int $id, \DateTime $tweetedAt)
    {
        $this->id = $id;
        $this->tweetedAt = clone $tweetedAt;
    }

    public function createReadModelForListView() : array
    {
        return [
            'tweetedWhen' => Carbon::instance($this->tweetedAt)->diffForHumans(),
            'fullTweetUrl' => sprintf('https://twitter.com/%d', $this->id)
        ];
    }
}
