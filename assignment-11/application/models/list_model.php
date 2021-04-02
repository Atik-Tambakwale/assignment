<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class list_model extends CI_Model{

	function count_all(){
		$query=$this->db->get("ksa_list");
		return $query->num_rows();
	}
	function fetch_details(){
		$output='';
		$query=$this->db->get('ksa_list');
		
		if(count($query->result())>1){
			$output .='
				<thead>
				<tr>
				<td>#</td>
				<td>MEMBER_ID</td>
				<td>MEMBER_TYPE</td>
				<td>TITLE</td>
				<td>NAME</td>
				<td>ADDRESS_1</td>
				<td>ADDRESS_2</td>
				<td>ADDRESS_3</td>
				<td>ADDRESS_4</td>
				<td>CITY</td>
				<td>PIN</td>
				<td>MOBILE</td>
				<td>EMAIL</td>
				<td>MONTH</td>
				<td>YEAR</td>
				<td>DESTFILE</td>
				<td>MAGRETURN</td>
				<td>STOPMAIL</td>
				<td>EXPIRED</td>
				<td>HANDDELV</td>
			</tr>
				</thead>
				<tbody class="tbody">
		';
		foreach ($query->result() as $row) {
			$output.='<tr>
						<td>'.(($row->id)-1).'</td>
						<td>'.$row->MEMBER_ID .'</td>
						<td>'.$row->MEMBER_TYPE .'</td>
						<td>'.$row->TITLE .'</td>
						<td>'.$row->NAME .'</td>
						<td>'.$row->ADDRESS_1 .'</td>
						<td>'.$row->ADDRESS_2 .'</td>
						<td>'.$row->ADDRESS_3 .'</td>
						<td>'.$row->ADDRESS_4 .'</td>
						<td>'.$row->CITY .'</td>
						<td>'.$row->PIN .'</td>
						<td>'.$row->MOBILE .'</td>
						<td>'.$row->EMAIL .'</td>
						<td>'.$row->MONTH .'</td>
						<td>'.$row->YEAR .'</td>
						<td>'.$row->DESTFILE .'</td>
						<td>'.$row->MAGRETURN .'</td>
						<td>'.$row->STOPMAIL .'</td>
						<td>'.$row->EXPIRED .'</td>
						<td>'.$row->HANDDELV .'</td>
					  </tr>';
		}
		$output.='</tbody>';
		}
		else{
			$output="<p style='text-align:center;font-size:25px;'>No list available for display</p>";
		}
		return $output;		
	}

}
?>      
