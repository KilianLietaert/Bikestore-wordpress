<?php

namespace Google\Site_Kit_Dependencies;

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
class Google_Service_PeopleService_Location extends \Google\Site_Kit_Dependencies\Google_Model
{
    public $buildingId;
    public $current;
    public $deskCode;
    public $floor;
    public $floorSection;
    protected $metadataType = 'Google\Site_Kit_Dependencies\Google_Service_PeopleService_FieldMetadata';
    protected $metadataDataType = '';
    public $type;
    public $value;
    public function setBuildingId($buildingId)
    {
        $this->buildingId = $buildingId;
    }
    public function getBuildingId()
    {
        return $this->buildingId;
    }
    public function setCurrent($current)
    {
        $this->current = $current;
    }
    public function getCurrent()
    {
        return $this->current;
    }
    public function setDeskCode($deskCode)
    {
        $this->deskCode = $deskCode;
    }
    public function getDeskCode()
    {
        return $this->deskCode;
    }
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }
    public function getFloor()
    {
        return $this->floor;
    }
    public function setFloorSection($floorSection)
    {
        $this->floorSection = $floorSection;
    }
    public function getFloorSection()
    {
        return $this->floorSection;
    }
    /**
     * @param Google_Service_PeopleService_FieldMetadata
     */
    public function setMetadata(\Google\Site_Kit_Dependencies\Google_Service_PeopleService_FieldMetadata $metadata)
    {
        $this->metadata = $metadata;
    }
    /**
     * @return Google_Service_PeopleService_FieldMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function getValue()
    {
        return $this->value;
    }
}