<?php

// Datenbank Klasse
class db_core
{
	private	$db_host = '',
			$db_database = '',
			$db_user = '',
			$db_password = '',
			$db_connect = false;
	public	$query_count = 0;


	// Init Funktion
	function __construct()
	{
		$this -> db_host 		= PRJ_DB_HOST;
		$this -> db_database	= PRJ_DB_DATABASE;
		$this -> db_user		= PRJ_DB_USER;
		$this -> db_password	= PRJ_DB_PASSWORD;
		$this -> db_connect		= $this -> create_connection();
	}

	// Mit Datenbank verbinden
	private function create_connection()
	{
		$dbret = @mysql_pconnect( $this -> db_host, $this -> db_user, $this -> db_password ) or die( __("Keine Verbindung zur Datenbank möglich!\n",'argucracy') );
		@mysql_select_db( $this -> db_database ) or die( "Fehler: Datenbank \"" . $this -> db_database . "\" nicht gefunden" );
		return $dbret;
	}

	// Funktion macht einen DB_QUERY
	public function query( $befehl )
	{
		$this -> query_count++;
		$retstr = @mysql_query( $befehl, $this -> db_connect );
		return $retstr;
	}

	// Funktion zum auslesen eines Feldwertes nach query
	public function query_field( $befehl, $field )
	{
		$this -> query_count++;
		$dbresult = $this -> query( "$befehl" );
		if( $dbresult )
		{
			if( mysql_num_rows( $dbresult ) )
			{
				$data = $this -> fetch_array( $dbresult );
				$this -> free_result( $dbresult );
				return $data[ "$field" ];
			}
			else return false;
		}
		else return false;
	}

	// Liefert die zuletzt eingefügte auto_increment id
	public function insert_id( $result = false )
	{
		if( !$result )
			return mysql_insert_id();
		else
			return mysql_insert_id( $result );
	}

	// Liefert mysql_num_rows zurück
	public function rowsfound( $result )
	{
		return mysql_num_rows( $result );
	}

	// Liefert mysql_fetch_array zurück
	public function fetch_array( $result )
	{
		return mysql_fetch_array( $result );
	}

	// Liefert mysql_fetch_assoc zurück
	public function fetch_assoc( $result )
	{
		return mysql_fetch_assoc( $result );
	}

	// Liefert mysql_fetch_object zurück
	public function fetch_object( $result )
	{
		return mysql_fetch_object( $result );
	}

	// Liefert mysql_fetch_object zurück
	public function fetch_complete_object( $result )
	{
		while( $row = mysql_fetch_object( $result ) )
			$result_arr[] = $row;
		$this -> free_result( $result );
		return $result_arr;
	}

	// Liefert mysql_fetch_array zurück
	public function fetch_complete_array( $result )
	{
		while( $row = mysql_fetch_array( $result ) )
			$result_arr[] = $row;
		$this -> free_result( $result );
		return $result_arr;
	}

	// Liefert mysql_fetch_array zurück
	public function fetch_complete_field( $result, $field )
	{
		while( $row = mysql_fetch_array( $result ) )
			$result_arr[] = $row[ $field ];
		$this -> free_result( $result );
		return $result_arr;
	}

	// Liefert für fetch_row ein result String aller bestehenden Tabellen in der DB
	public function list_tables()
	{
		$retstr = @mysql_list_tables( $this -> db_database, $this -> db_connect );
		return $retstr;
	}

	// Liefert für fetch_row ein result String aller bestehenden Tabellen in der DB
	public function list_fields( $tablename )
	{
		$retstr = $this -> query( "SHOW FIELDS FROM " . $this -> db_database . ".$tablename;" );
		return $retstr;
	}

	// Liefert die "affected rows" zurück
	public function affected_rows( $result )
	{
		return mysql_affected_rows( $result );
	}

	// mySQL Resource wieder freigeben
	public function free_result( &$result )
	{
		mysql_free_result( $result );
	}

	// Funktion zum überprüfen, ob eine Tabelle in der Datenbank existiert
	public function table_exists( $tablename )
	{
		$dbresult = list_tables();
		$table_found = false;
		while( $tabelle = mysql_fetch_row( $dbresult) )
		{
			if( $tabelle[ 0 ] == $tablename )
			{
				$table_found = true;
				break;
			}
		}
		return $table_found;
	}

	// SQL Escape string
	public function escape( $str )
	{
		return mysql_real_escape_string( $str );
	}
}
