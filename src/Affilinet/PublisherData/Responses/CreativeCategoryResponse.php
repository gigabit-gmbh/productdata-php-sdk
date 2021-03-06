<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\CreativeCategory;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class CreativeCategoryResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class CreativeCategoryResponse extends AbstractSoapResponse {

    /** @var array<CreativeCategory> $creativeCategories */
    protected $creativeCategories;

    /**
     * PaymentResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->CreativeCategoryCollection)) {
            $this->creativeCategories = null;

            return;
        }
        $this->creativeCategories = array();
        $creativeCategoryResponse = $response->CreativeCategoryCollection->CreativeCategory;
        if (is_array($creativeCategoryResponse)) {
            foreach ($creativeCategoryResponse as $creativeCategory) {
                array_push($this->creativeCategories, new CreativeCategory($creativeCategory));
            }
        } else {
            array_push($this->creativeCategories, new CreativeCategory($creativeCategoryResponse));
        }
    }

    /**
     * @return array<CreativeCategory>|null
     */
    public function getCreativeCategories() {
        return $this->creativeCategories;
    }

}
