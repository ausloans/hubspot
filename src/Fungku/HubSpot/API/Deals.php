<?php

namespace Fungku\HubSpot\API;

/**
* Copyright 2013 HubSpot, Inc.
*
*   Licensed under the Apache License, Version 2.0 (the
* "License"); you may not use this file except in compliance
* with the License.
*   You may obtain a copy of the License at
*
*       http://www.apache.org/licenses/LICENSE-2.0
*
*   Unless required by applicable law or agreed to in writing,
* software distributed under the License is distributed on an
* "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
* either express or implied.  See the License for the specific
* language governing permissions and limitations under the
* License.
*/

class Deals extends BaseClient {
	//Client for HubSpot Deals API

	    //Define required client variables
	protected $API_PATH = 'deals';
	protected $API_VERSION = 'v1';


    /**
    * Create a Deal
    *
    *@param params: array of properties and property values for new deal, email is required
    *
    * @return Response body with JSON object 
    * for created Deal from HTTP POST request
    *
    * @throws HubSpotException
    **/
    public function create_deal($params){
    	$endpoint = 'deal';
    	$properties = array();
    	foreach ($params as $key => $value) {
    		array_push($properties, array("property" => $key,"value" => $value));
    	}
    	$properties = json_encode(array("properties"=>$properties));
    	try{
    		return json_decode($this->execute_JSON_post_request($this->get_request_url($endpoint,null),$properties));
    	} catch (HubSpotException $e) {
    		throw new HubSpotException('Unable to create deal: ' . $e);
    	}
    }

    /**
    * Update a Deal
    *
    *@param params: array of properties and property values for deal
    *
    * @return Response body from HTTP POST request
    *
    * @throws HubSpotException
    **/
    public function update_deal($dealId, $params){
    	$endpoint = 'deal/' . $dealId;
    	$properties = array();
    	foreach ($params as $key => $value) {
    		array_push($properties, array("property" => $key,"value" => $value));
    	}
    	$properties = json_encode(array("properties" => $properties));
    	try{
			return json_decode($this->execute_JSON_post_request($this->get_request_url($endpoint,null),$properties));
    	} catch (HubSpotException $e) {
    		throw new HubSpotException('Unable to update deal: ' . $e);
    	}
    }

    /**
	* Delete a Deal
	*
	*@param dealId: Unique ID for the deal
	*
	* @return Response body from HTTP POST request
	*
	* @throws HubSpotException
    **/
    public function delete_deal($dealId){
    	$endpoint = 'deal/' . $dealId;
    	try{
    		return json_decode($this->execute_delete_request($this->get_request_url($endpoint,null),null));
    	}
    	catch (HubSpotException $e) {
    		throw new HubSpotException('Unable to delete deal: ' . $e);
    	}
    }

    /**
	* Get all Deals
	*
	*@param params: array of 'count' for results
	*
	* @return JSON objects for all Deals in portal
	*
	* @throws HubSpotException
    **/
    public function get_all_deals($params){
    	$endpoint = 'deal/paged';
    	try{
    		return json_decode($this->execute_get_request($this->get_request_url($endpoint,$params)));
    	}
    	catch(HubSpotException $e){
    		throw new HubSpotException('Unable to get deals: '.$e);
    	}
    }

    /**
	* Get recently updated Deals
	*
	*@param params: array of 'count', 'time-offset', for results	
	*
	* @return JSON objects for recently updated Deals in portal
	*
	* @throws HubSpotException
    **/
    public function get_recent_deals($params){
    	$endpoint = 'deal/recent/modified';
    	try{
    		return json_decode($this->execute_get_request($this->get_request_url($endpoint,$params)));
    	}
    	catch(HubSpotException $e){
    		throw new HubSpotException('Unable to get deals: '.$e);
    	}
    }

    /**
	* Get Deal by ID
	*
	*@param dealId: Unique ID for deal
	*
	* @return JSON object for requested Deal
	*
	* @throws HubSpotException
    **/
    public function get_deal_by_id($dealId){
    	$endpoint = 'deal/' . $dealId;
    	try{
    		return json_decode($this->execute_get_request($this->get_request_url($endpoint,null)));
    	}
    	catch(HubSpotException $e){
    		throw new HubSpotException('Unable to get deal: '.$e);
    	}
    }


}

?>