<?php

namespace Test\Assignment03;

use Assignment03\Solution2\Tweet;

class TweetReadModelForListViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function a_tweet_read_model_for_list_views_contains_a_human_readable_time_diff_and_a_url_to_the_full_tweet()
    {
        $tweet = new Tweet(12345678, new \DateTime('-1 minute'));

        $readModel = $tweet->createReadModelForListView();

        $this->assertEquals('https://twitter.com/12345678', $readModel['fullTweetUrl']);
        $this->assertEquals('1 minute ago', $readModel['tweetedWhen']);
    }
}
