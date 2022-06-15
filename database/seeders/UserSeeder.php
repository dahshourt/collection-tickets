<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => "1",
			'user_name' => "Treza.E70751",
			'email' => "Treza.E70751@te.eg",
			'first_name' => "Treza Ebrahim Fayez Nashed",
			'active_directory' => "1",
            'active' => '1',
        ]);
        DB::table('users')->insert([
            'id' => "2",
			'user_name' => "shimaa.M70733",
			'email' => "shimaa.M70733@te.eg",
			'first_name' => "Shimaa Mohamed elsayed abdelhamid",
			'active_directory' => "1",
            'active' => '1',
        ]);
        DB::table('users')->insert([
            'id' => "3",
			'user_name' => "sherif.mabdellatif",
			'email' => "sherif.mabdellatif@te.eg",
			'first_name' => "Sherif Mostafa Abdel-Latif",
			'active_directory' => "1",
            'active' => '1',
        ]);

        DB::table('users')->insert([
            'id' => "4",
			'user_name' => "Sally.E.Farid",
			'email' => "Sally.E.Farid@te.eg",
			'first_name' => "Sally Emad Farid Metry ",
			'active_directory' => "1",
            'active' => '1',
        ]);
        DB::table('users')->insert([
           'id' => "5",
			'user_name' => "Mohamed.S.Elqady",
			'email' => "Mohamed.S.Elqady@te.eg",
			'first_name' => "Safwat El Qady",
			'active_directory' => "1",
            'active' => '1',
        ]);
        DB::table('users')->insert([
            'id' => "6",
			'user_name' => "reham.r.mostafa",
			'email' => "reham.r.mostafa@te.eg",
			'first_name' => "Reham Reda Mostafa",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
            'id' => "7",
			'user_name' => "rehab.sharaf",
			'email' => "rehab.sharaf@te.eg",
			'first_name' => "Rehab Sharaf",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
            'id' => "8",
			'user_name' => "Radwa.Z70766",
			'email' => "Radwa.Z70766@te.eg",
			'first_name' => "Radwa Zakaria Abdelaziz Ali",
			'active_directory' => "1",
            'active' => '1',
        ]);
        DB::table('users')->insert([
            'id' => "9",
			'user_name' => "IBS.Omar.80131",
			'email' => "IBS.Omar.80131@te.eg",
			'first_name' => "Omar Mohamed Saad Mohamed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "10",
			'user_name' => "Omar.Ismail",
			'email' => "Omar.Ismail@te.eg",
			'first_name' => "Omar Ismail Mahdy Hassan",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "11",
			'user_name' => "Nourhan.N70664",
			'email' => "Nourhan.N70664@te.eg",
			'first_name' => "Nourhan Nasr Ibrahim Abdelaziz",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "12",
			'user_name' => "Nermine.S80105",
			'email' => "Nermine.S80105@te.eg",
			'first_name' => "Nermine Salah Ibrahim Hamed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "13",
			'user_name' => "nada.m70732",
			'email' => "nada.m70732@te.eg",
			'first_name' => "Nada Moharram El Amin",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "14",
			'user_name' => "Nada.H70846",
			'email' => "Nada.H70846@te.eg",
			'first_name' => "Nada Hafez Farouk Hafez",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "15",
			'user_name' => "moustafa.tohamy",
			'email' => "moustafa.tohamy@te.eg",
			'first_name' => "Moustafa Tohamy",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "16",
			'user_name' => "Monika.Mofeed",
			'email' => "Monika.Mofeed@te.eg",
			'first_name' => "Monika Mofeed Sobhy Gerges",
			'active_directory' => "1",
            'active' => '1',
        ]);DB::table('users')->insert([
			'id' => "17",
			'user_name' => "Mohammed.magdi",
			'email' => "Mohammed.magdi@te.eg",
			'first_name' => "Mohammed Magdi ahmed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "18",
			'user_name' => "mohammed.esmail",
			'email' => "mohammed.esmail@te.eg",
			'first_name' => "Mohammed Esmail",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "19",
			'user_name' => "mohamed.t70601",
			'email' => "mohamed.t70601@te.eg",
			'first_name' => "mohamed tarek mohamed ibrahim",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "20",
			'user_name' => "mohamed.raafat",
			'email' => "mohamed.raafat@te.eg",
			'first_name' => "Mohamed Raafat",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "21",
			'user_name' => "Mohamed.AbdElfatah",
			'email' => "Mohamed.AbdElfatah@te.eg",
			'first_name' => "Mohamed Mostafa Abdel-Fattah",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "22",
			'user_name' => "Mohamed.M70754",
			'email' => "Mohamed.M70754@te.eg",
			'first_name' => "Mohamed Monier Mohamed AbdAlmoaty",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "23",
			'user_name' => "Mohamed.m70945",
			'email' => "Mohamed.m70945@te.eg",
			'first_name' => "Mohamed magdy Atwa",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "24",
			'user_name' => "Mohamed.M70885",
			'email' => "Mohamed.M70885@te.eg",
			'first_name' => "Mohamed Magdy Abd Elsadk Amen Elshafaay",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "25",
			'user_name' => "mohamed.fsoliman",
			'email' => "mohamed.fsoliman@te.eg",
			'first_name' => "Mohamed fathy soliman",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "26",
			'user_name' => "mohamed.abadawy",
			'email' => "mohamed.abadawy@te.eg",
			'first_name' => "Mohamed Badawy Ahmed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "27",
			'user_name' => "mohamed.asaad",
			'email' => "mohamed.asaad@te.eg",
			'first_name' => "Mohamed Ahmed Saad",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "28",
			'user_name' => "Mohamed.A70884",
			'email' => "Mohamed.A70884@te.eg",
			'first_name' => "Mohamed Abd elattif Hamed Abd elattif",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "29",
			'user_name' => "Marwa.Elhenawy",
			'email' => "Marwa.Elhenawy@te.eg",
			'first_name' => "Marwa Elhenawy",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "30",
			'user_name' => "Marina.E80046",
			'email' => "Marina.E80046@te.eg",
			'first_name' => "Marina Emil Edward amin",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "31",
			'user_name' => "mai.a70815",
			'email' => "mai.a70815@te.eg",
			'first_name' => "Mai Ahmed Yousef Gaber",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "32",
			'user_name' => "mahmoud.omar",
			'email' => "mahmoud.omar@te.eg",
			'first_name' => "Mahmoud Omar",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "33",
			'user_name' => "Mahmoud.M230269",
			'email' => "Mahmoud.M230269@te.eg",
			'first_name' => "Mahmoud Mamdouh El-Sayed Shahen",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "34",
			'user_name' => "Maha.S71957",
			'email' => "Maha.S71957@te.eg",
			'first_name' => "Maha Samir Mohamed AbdelAal",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "35",
			'user_name' => "wafaa.aboelleil",
			'email' => "wafaa.aboelleil@te.eg",
			'first_name' => "Wafaa Abdelaziz",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "36",
			'user_name' => "Shadwa.M70809",
			'email' => "Shadwa.M70809@te.eg",
			'first_name' => "Shadwa Mohamed Osama Fouad",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "37",
			'user_name' => "Nouran.a70762",
			'email' => "Nouran.a70762@te.eg",
			'first_name' => "Nouran Ali Abdelrahman Ahmed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "38",
			'user_name' => "moustapha.fahmy",
			'email' => "moustapha.fahmy@te.eg",
			'first_name' => "Moustapha Fahmy",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "39",
			'user_name' => "Mohamed.O71955",
			'email' => "Mohamed.O71955@te.eg",
			'first_name' => "Mohammed Osama Abdel Aziz",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "40",
			'user_name' => "Mohamed.e70883",
			'email' => "Mohamed.e70883@te.eg",
			'first_name' => "Mohamed Emad Hassan abd elatiif",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "41",
			'user_name' => "Merna.S73509",
			'email' => "Merna.S73509@te.eg",
			'first_name' => "Merna Samy Nassif Hanna",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "42",
			'user_name' => "Hadeer.a70512",
			'email' => "Hadeer.a70512@te.eg",
			'first_name' => "Hadeer abd el rahim osman el gamal",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "43",
			'user_name' => "dalia.hamed",
			'email' => "dalia.hamed@te.eg",
			'first_name' => "Dalia Hamed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "44",
			'user_name' => "Amr.M70742",
			'email' => "Amr.M70742@te.eg",
			'first_name' => "Amr Mohamed Mohamed Ahmed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "45",
			'user_name' => "amgad.ali",
			'email' => "amgad.ali@te.eg",
			'first_name' => "Amgad Ali Maher Anwar",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "46",
			'user_name' => "Ahmed.Gmoursy",
			'email' => "Ahmed.Gmoursy@te.eg",
			'first_name' => "Ahmed Gomaa",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "47",
			'user_name' => "sherif.abdelmonam",
			'email' => "sherif.abdelmonam@te.eg",
			'first_name' => "sherif Eldeep",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "48",
			'user_name' => "mohamed.elabody",
			'email' => "mohamed.elabody@te.eg",
			'first_name' => "mohamed elabody",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "49",
			'user_name' => "mohamed.a.elmasry",
			'email' => "mohamed.a.elmasry@te.eg",
			'first_name' => "mohamed Elmasry",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "50",
			'user_name' => " Mohamed.H.hassan",
			'email' => "Mohamed.H.hassan@te.eg",
			'first_name' => "mohamed Hassan",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "51",
			'user_name' => "moataz.samir",
			'email' => "moataz.samir@te.eg",
			'first_name' => "moataz.samir",
			'active_directory' => "1",
            'active' => '1',
        ]);
		DB::table('users')->insert([
			'id' => "52",
			'user_name' => "moataz.m.ahmed",
			'email' => "moataz.m.ahmed@te.eg",
			'first_name' => "moataz.mohamed",
			'active_directory' => "1",
            'active' => '1',
        ]);
		
    }
}
