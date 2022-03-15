// let menu = document.querySelector('#menu-btn');
// let navbar = document.querySelector('.header .navbar');

// menu.onclick = () =>{
//    menu.classList.toggle('fa-times');
//    navbar.classList.toggle('active');
// };

// window.onscroll = () =>{
//    menu.classList.remove('fa-times');
//    navbar.classList.remove('active');
// };


// document.querySelector('#close-edit').onclick = () =>{
//    document.querySelector('.edit-form-container').style.display = 'none';
//    window.location.href = 'admin.php';
// };


var tabla = document.querySelector(".tabla");
var dataTable = new DataTable(tabla, {
   perPage: 5,
   perPageSelect: [10, 20, 30, 40, 100],
   fixedHeight: true,
   
   
});

$(document).ready(function() {
   $(".tabla").DataTable( {
       dom: 'Bfrtip',
       buttons: [
           {
               extend: 'print',
               messageTop: 'This print was produced using the Print button for DataTables'
           }
       ]
   } );
} );


const texto = document.querySelector(".dataTables-empty");
texto.textContent = 'Buscar Entre Los Pedidos';



// var datatable = new DataTable(".tabla", {
//    columns: [
//       // Sort the second column in ascending order
//       { select: 1, sort: "asc" },

//       // Set the third column as datetime string matching the format "DD/MM/YYY"
//       { select: 2, type: "date", format: "DD/MM/YYYY" },

//       // Disable sorting on the fourth and fifth columns
//       { select: [3, 4], sortable: false },

//       // Hide the sixth column
//       { select: 5, hidden: true },

//       // Append a button to the seventh column
//       {
//          select: 6,
//          render: function (data, cell, row) {
//             return data + "<button type='button' data-row='" + row.dataIndex + "'>Select</button>";
//          }
//       }
//    ]
// });

// $('.tabla').DataTable({
//    columnDefs: [{
//       title: 'My column title',
//       targets: 0
//    }]
// });

// $('.tabla').DataTable({
//    columns: [
//       { title: 'My column title' },
//       null,
//       null,
//       null,
//       null,
//    ]
// });
// var table = $('.tabla').DataTable();

// $('#example tbody').on('click', 'td', function () {
//    var idx = table.cell(this).index().column;
//    var title = table.column(idx).header();

//    alert('Column title clicked on: ' + $(title).html());
// });





