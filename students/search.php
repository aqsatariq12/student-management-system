<?php
include "../config.php";

$search =$_GET['q'] ?? '';
if(!empty($search)){
    $sql = "SELECT * FROM students 
    Where name LIKE '%$search%' 
    or email lIKE '%$search%'";
} else{
    $sql = "SELECT * FROM students";
}
$result = mysqli_query($conn, $sql);

?>
<thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">PhoneNo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr class="align-middle">
                                            <td>
                                                <?php echo $row['id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email'] ?>
                                            </td>
                                            <td><span class="badge text-bg-warning">
                                                    <?php echo $row['phone'] ?>
                                                </span></td>
                                            <td>
                                                <div class="list-btn">
                                                    <div>
                                                        <a href="edit.php?id=<?php echo $row['id'] ?>" type="button"
                                                            class="btn btn-outline-warning mb-2">Update</a>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-outline-danger mb-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal<?= $row['id']; ?>">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirm Delete</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Are you sure you want to delete this student?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="delete.php?id=<?= $row['id']; ?>"
                                                                class="btn btn-danger">
                                                                Yes, Delete
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php } ?>
                                </tbody>
