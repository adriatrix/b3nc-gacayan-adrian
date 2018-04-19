<?php
if(!empty($customers ))
{
    $count = 1;
    // $outputhead = '';
    $outputbody = '';
    // $outputtail ='';

    // $outputhead .= '<div class="table-responsive">
    //                 <table class="table table-bordered">
    //                     <thead>
    //                         <tr>
    //                             <th>No</th>
    //                             <th>Title</th>
    //                             <th>Body</th>
    //                             <th>Created At</th>
    //                             <th>Options</th>
    //                         </tr>
    //                     </thead>
    //                     <tbody>
    //             ';


    foreach ($customers as $customer) {
      <a href="#" class="badge badge-info">{{$customer->name}}</a>&nbsp;
    }

    // $outputtail .= '
    //                     </tbody>
    //                 </table>
    //             </div>';

    // echo $outputhead;
    echo $outputbody;
    // echo $outputtail;
 }

 else
 {
    echo 'Data Not Found';
 }
 ?>
