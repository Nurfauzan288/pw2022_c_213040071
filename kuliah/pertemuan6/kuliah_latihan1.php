<?php 
// Array Assiciative
// Array yang indexnya berupa string yang ber-asosiasi dengan nilai nya

$mahasiswa = [

	["nama" => "Nurfauzan Ramadhan",
    "npm" => "213040071", 
    "email" => "rfauzan974@gmail.com", 
    "prodi" => "teknik informatika",
    "gambar" => "r34.jpg"],

    ["nama" => "Adam Maulana Kusumah",
    "npm" => "213040086", 
    "email" => "adam.213040086@mail.unpas.ac.id", 
    "prodi" => "teknik informatika",
    "gambar" => "scirocco.jpg"],
];

?>
<?php foreach($mahasiswa as $mhs)
{ ?>
<ul>
    <li>nama : <?php echo $mhs["nama"]?></li>
    <li>NPM : <?php echo $mhs["NPM"]?></li>
    <li>Email : <?php echo $mhs["Email"]?></li>
    <li>Jurusan : <?php echo $mhs["Jurusan"]?></li>
</ul>
    <?php } ?>