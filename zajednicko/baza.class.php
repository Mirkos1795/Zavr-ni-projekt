<?php
class Baza {

	/**
	* Podaci za spajanje na bazu
	* host = naziv servera, url ili ip adresa
	* korisnik = username sistemskog user-a s kojim se spajamo na bazu
	* lozinka = password sistemskog user-a s kojim se spajamo na bazu
	* baza = ime baze na koju se spajamo
	* detalji se nalaze na http://localhost/phpmyadmin/server_privileges.php?db=projekt&checkprivsdb=projekt&viewing_mode=db
	*/
	private $host = "localhost";
	private $korisnik = "root";
	private $lozinka = "";
	private $baza = "glazba";

	/**
	 * metoda za spajanje na bazu
	 * koristi biblioteku mysqli koja nam olaksava rad s mysql bazom u php-u
	 * vraca objekt veza (connection) koji koristimo za pristup bazi
	 */
	private function spoji()
	{	
		$veza = new mysqli($this->host, $this->korisnik, $this->lozinka, $this->baza);
		if($veza->connect_error){
            die("Greška kod otvaranja veze na BP: " . $veza->connect_error);
        }
		return $veza;	
	}
	
	/**
	 * metoda za zatvaranje veze na bazu
	 */
	private function odspoji($veza)
	{
		mysqli_close($veza);
	}
	
	/**
	 * metoda za izvrsavanje nad bazom
	 * prima sql string
	 * vraca rezultat upita
	 */
	public function upit($sqlupit)
	{
		$veza = $this->spoji();
		$veza->query( "SET NAMES utf8" );
		$rezultat = $veza->query($sqlupit);
		$this->odspoji($veza);
		return $rezultat;
	}
	
	/**
	 * metoda za izvrsavanje nad bazom
	 * prima sql string
	 * vraca id unosa ako je operacija bila uspjesna
	 * vraca 0 ako je operacija bila neuspjesna
	 */
	public function insert($sqlupit)
	{
		$veza = $this->spoji();
		$veza->query( "SET NAMES utf8" );
		$rezultat = $veza->query($sqlupit);
		//var_dump($veza->error);
		$id = $veza->insert_id;
		$this->odspoji($veza);
		return $id;
	}
}
?>