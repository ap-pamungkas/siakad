import './bootstrap';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt'

Swal.fire({
    title: 'Success',
    text: response.data.message, // Assuming the response contains the notification message
    icon: 'success',
    timer: 2000, // Duration to display the notification (in milliseconds)
});



let table = new DataTable('#myTable', {
    responsive: true
});
