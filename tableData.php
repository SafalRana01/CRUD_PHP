<!-- Table -->
<table class="table" id="usertable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
<!-- data-bs-target and id of the respected model shoukd be match. For example there is data-bs-target and id same i.e userViewModel of view profile icon and profile.php -->
<!-- <i class="fa-solid fa-eye text-info"> i have written text-info(blue) that shows my icon blue in color where text-success shows green color and text-danger shows red in color -->
<!-- I have also given title=View profile. This properties works when i hover over delete icon it show delete as a title.It is not nuccessary but for better looks you can use this  -->
                        <a href="#" class="me-3 edituser" data-bs-toggle="modal" data-bs-target="#userModal" title="Edit Profile"><i class="fa-solid fa-user-pen text-success"></i></i></a>
                        <a href="#" class="me-3 profile" data-bs-toggle="modal" data-bs-target="#userViewModal" title="View Profile"><i class="fa-solid fa-eye text-info"></i></i></a>
                        <a href="#" class="me-3 deleteuser" title="Delete"><i class="fa-solid fa-trash text-danger"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

