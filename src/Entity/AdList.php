<?php


namespace App\Entity;


class AdList {

    /**
     * @var Ad[]
     */
    protected $ads;

    /**
     * AdList constructor.
     * @param Ad[] $ads
     */
    public function __construct($ads) {
        $this->ads = $ads;
    }

    /**
     * @return Ad[]
     */
    public function getAds() {
        return $this->ads;
    }

    /**
     * @param Ad[] $ads
     */
    public function setAds($ads): void {
        $this->ads = $ads;
    }
}