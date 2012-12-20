<?php

// Klasse om dingen met datum te doen
class Date
{
    public $day;
    public $month;
    public $year;

    // Zet de datum op vandaag.
    public function now()
    {
        $this->day         = date('j');
        $this->month     = date('n');
        $this->year     = date('Y');
    }

    // Voeg een bepaald aantal dagen toe
    public function addDays($days)
    {
        // Voeg dagen toe
        $new_date = mktime(0,0,0, $this->month, $this->day + $days, $this->year);

        $this->day       = date('j', $new_date);
        $this->month     = date('n', $new_date);
        $this->year        = date('Y', $new_date);
    }

    // Dag van de week als tekst
    public function dayOfWeek()
    {
        $current_date = mktime(0,0,0, $this->month, $this->day, $this->year);
        $day_number = date('N', $current_date);

        $dayInDutch[1] = 'Maandag';
        $dayInDutch[2] = 'Dinsdag';
        $dayInDutch[3] = 'Woensdag';
        $dayInDutch[4] = 'Donderdag';
        $dayInDutch[5] = 'Vrijdag';
        $dayInDutch[6] = 'Zaterdag';
        $dayInDutch[7] = 'Zondag';

        return $dayInDutch[$day_number];
    }
    // Maand van het jaar als tekst.
    public function monthOfTheYear()
    {
        $current_date = mktime(0,0,0, $this->month, $this->day, $this->year);
        $month_number = date('n', $current_date);

        $monthInDutch[1] = 'Januari';
        $monthInDutch[2] = 'Februari';
        $monthInDutch[3] = 'Maart';
        $monthInDutch[4] = 'April';
        $monthInDutch[5] = 'Mei';
        $monthInDutch[6] = 'Juni';
        $monthInDutch[7] = 'Juli';
        $monthInDutch[8] = 'Augustus';
        $monthInDutch[9] = 'September';
        $monthInDutch[10] = 'Oktober';
        $monthInDutch[11] = 'November';
        $monthInDutch[12] = 'December';

        return $monthInDutch[$month_number];
    } 


    // Zet neer als string
    //update Jelle, Created magic method.
    public function __toString()
    {
        return "$this->day $this->month $this->year";
    }
}

?>