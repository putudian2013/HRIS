<table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Payroll Number</th>
            <th>Full Name</th>                                                
            <th>Company</th>
            <th>Division</th>
            <th>Department</th>
            <th>Section</th>
            <th>Position</th>
            <th>Category</th>                                                
            <th>Commencing Date</th>                                                
            <th>Contract End Date</th>                                                                                                     
        </tr>
    </thead>
    <tbody> 
        <?php
            $no = 0;
            foreach ($employee->result() as $row) :
                $no++;
        ?>                                                                                                
                <tr>
                    <td width="5%"><?php echo $no; ?></td>                                               
                    <td><?php echo $row->payroll_number; ?></td>
                    <td><?php echo $row->full_name; ?></td>    
                    <td><?php echo $row->company_name; ?></td>
                    <td><?php echo $row->division_name; ?></td>
                    <td><?php echo $row->department_name; ?></td>
                    <td><?php echo $row->section_name; ?></td>
                    <td><?php echo $row->position_name; ?></td>
                    <td><?php echo $row->emp_category_name; ?></td>
                    <td><?php echo $row->commencing_date; ?></td>
                    <td><?php echo $row->contract_end_date; ?></td>                    
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>