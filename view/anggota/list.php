<?php 
// file : oopmvc/view/anggota/list.php
$judul = "Daftar Anggota";
ob_start()
?>
<div class="container" >
<h1>Daftar Anggota</h1>
 <a href="http://localhost/oopmvc/index.php/anggota/create"> <button class="btn btn-success">Tambah Anggota</button></a> 
<table class="table">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal lahir</th>
        <th>Detail</th>

   
        
    </tr>
    <?php foreach ($anggota as $row) : ?>
    <tr>
        <td><?= $row['id'];  ?></td>
        <td><?= $row['nama'];  ?></td>
        <td><?= $row['tanggal_lahir'];  ?></td>
        <td> <a class="btn btn-primary" href="anggota/detail?id=<?= $row['id']?> "> VIEW </a>
             <a class="btn btn-warning" href="anggota/edit?id=<?= $row['id']?> "> EDIT </a>
             <a class="btn btn-danger delete-button" href="anggota/delete?id=<?= $row['id']; ?>">DELETE</a>
            </td>
    </tr>
    <?php endforeach; ?>
</table>

</div>
<?php $isi = ob_get_clean() ?>
<?php include 'view/template.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var confirmDelete = confirm('Apakah Anda yakin ingin menghapus anggota ini?');
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });
});
</script>