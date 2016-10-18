<?php 
class Database
{
	var $rs;
	var $dbh;
	 
	
	function Database()
	{
		$this->rs = "";
		$this->dbh = "";
	}
		
	 
	//Connect to Database
	
	function connect()
	{
		//crossAhead#mysql1 - .in password 
     	//$this->dbh = mysql_connect('localhost', 'techteam' , 'Tech@321') or die('Not connected');
     	$this->dbh = mysqli_connect('localhost', 'root' , '','localmechanics') or die('Not connected');
		
		return $this->dbh;
    }	

    public function insert( $table, $variables = array() )
    {
        //self::$counter++;
        //Make sure the array isn't empty
        if( empty( $variables ) )
        {
            return false;
        }
        
        $sql = "INSERT INTO ". $table;
        $fields = array();
        $values = array();
        foreach( $variables as $field => $value )
        {
            $fields[] = $field;
            $values[] = "'".$value."'";
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';
        
        $sql .= $fields .' VALUES '. $values;

        
        if( mysqli_query($this->dbh , $sql ) )
        {
            
            return true;
        }
        else
        {
            return false;
        }
		
    }
	// update 
	public function update( $table, $variables = array(), $where = array() )
    {
        //self::$counter++;
        //Make sure the required data is passed before continuing
        //This does not include the $where variable as (though infrequently)
        //queries are designated to update entire tables
        if( empty( $variables ) )
        {
            return false;
        }
        $sql = "UPDATE ". $table ." SET ";
        foreach( $variables as $field => $value )
        {
            
            $updates[] = "`$field` = '$value'";
        }
        $sql .= implode(', ', $updates);
        
        //Add the $where clauses as needed
        if( !empty( $where ) )
        {
            foreach( $where as $field => $value )
            {
                $value = $value;

                $clause[] = "$field = '$value'";
            }
            $sql .= ' WHERE '. implode(' AND ', $clause);   
        }
        
       if(mysqli_query( $this->dbh , $sql ))
		{
			return true;
		}
		else
		{
			return false;
		}

    }
	
 public function delete( $table, $where = array(), $limit = '' )
    {
        
        //Delete clauses require a where param, otherwise use "truncate"
        if( empty( $where ) )
        {
            return false;
        }
        
        $sql = "DELETE FROM ". $table;
        foreach( $where as $field => $value )
        {
            $value = $value;
            $clause[] = "$field = '$value'";
        }
        $sql .= " WHERE ". implode(' AND ', $clause);
        
        if( !empty( $limit ) )
        {
            $sql .= " LIMIT ". $limit;
        }
            
        if(mysqli_query( $sql ,$this->dbh ))
		{
			return true;
		}
		else
		{
			return false;
		}
    }
	
	// clean input 
	function clean_input($data){
		$data = strip_tags($data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = preg_replace("/[^a-zA-Z0-9\s]/", "", $data);
		return $data;
	}
	// clean input email
	function clean_input_email($data){
		$data = strip_tags($data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getUserId($token){
		$sql = "SELECT fnum_mechanic_id FROM mechanic WHERE fstr_rand_tocken = '$token'";
		$sql_query = mysqli_query($this->dbh,$sql);
		$results = mysqli_fetch_object($sql_query);
		$mechanic_id = $results->fnum_mechanic_id;
		return $mechanic_id; 
	}
        
        function getMechanicDetails($mechanic_id) {
            
            $query = "SELECT fnum_mechanic_id,fstr_rand_tocken,fstr_mechanic_company_name,fstr_mechanic_name,fstr_mechanic_address,
                      fstr_mechanic_city,fstr_mechanic_state,fstr_mechanic_country,fnum_mechanic_zipCode,
                      fnum_mechanic_mobPhone,fstr_mechanic_nearestLandmark,fnum_mechanic_phone1,
                      fnum_mechanic_phone2,fstr_mechanic_email,fstr_mechanic_openingTime,fstr_mechanic_closingTime,
                      fnum_mechanic_available24hrs,fstr_mechanic_pick_drop,fnum_mechanic_rangeService,fstr_mechanic_contact_name,
                      fnum_mechanic_contact_mobile_number,fstr_mechanic_executive_name,fstr_mechanic_interest
                      FROM mechanic where fnum_mechanic_id = $mechanic_id";
            
            $sql_query = mysqli_query($this->dbh,$query);
            $data_top_array = array();
            $results = mysqli_fetch_array($sql_query);
            $data_array = array();
            $data_array['fnum_mechanic_id'] = $results['fnum_mechanic_id'];
            $data_array['fstr_rand_tocken'] = $results['fstr_rand_tocken'];
            $data_array['fstr_mechanic_company_name'] = $results['fstr_mechanic_company_name'];
            $data_array['fstr_mechanic_name'] = $results['fstr_mechanic_name'];
            $data_array['fstr_mechanic_address'] = $results['fstr_mechanic_address'];
            $data_array['fstr_mechanic_city'] = $results['fstr_mechanic_city'];
            $data_array['fstr_mechanic_state'] = $results['fstr_mechanic_state'];
            $data_array['fstr_mechanic_country'] = $results['fstr_mechanic_country'];
            $data_array['fnum_mechanic_zipCode'] = $results['fnum_mechanic_zipCode'];
            $data_array['fnum_mechanic_mobPhone'] = $results['fnum_mechanic_mobPhone'];

            $data_array['fstr_mechanic_nearestLandmark'] = $results['fstr_mechanic_nearestLandmark'];
            $data_array['fnum_mechanic_phone1'] = $results['fnum_mechanic_phone1'];
            $data_array['fnum_mechanic_phone2'] = $results['fnum_mechanic_phone2'];
            $data_array['fstr_mechanic_email'] = $results['fstr_mechanic_email'];
            $data_array['fstr_mechanic_openingTime'] = $results['fstr_mechanic_openingTime'];
            $data_array['fstr_mechanic_closingTime'] = $results['fstr_mechanic_closingTime'];
            $data_array['fnum_mechanic_available24hrs'] = $results['fnum_mechanic_available24hrs'];
            $data_array['fstr_mechanic_pick_drop'] = $results['fstr_mechanic_pick_drop'];
            $data_array['fnum_mechanic_rangeService'] = $results['fnum_mechanic_rangeService'];
            $data_array['fstr_mechanic_contact_name'] = $results['fstr_mechanic_contact_name'];
            $data_array['fnum_mechanic_contact_mobile_number'] = $results['fnum_mechanic_contact_mobile_number'];
            $data_array['fstr_mechanic_executive_name'] = $results['fstr_mechanic_executive_name'];
            $data_array['fstr_mechanic_interest'] = $results['fstr_mechanic_interest'];

            $data_top_array[] = $data_array;
            return $data_top_array;
        }

}
?>
