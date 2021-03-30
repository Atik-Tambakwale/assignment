<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class list_pagination_model extends CI_Model{

	function count_all(){
		$query=$this->db->get("ksa_members_list_as_on_04032021_1");
		return $query->num_rows();
	}
	function fetch_details($search,$limit,$start){
		$output='';
		$this->db->like('city',$search)->or_like('city',$search)->like('ADDR1',$search);
		$this->db->like('NAME',$search)->or_like('TITLE',$search)->like('NAME',$search);
		$this->db->or_like('PIN',$search);
		$query=$this->db->order_by('NAME ASC')->limit($limit,$start)
				 ->get('ksa_members_list_as_on_04032021_1');
		//echo $this->db->last_query($query);
		$output .='<table id="property-list" class="table table-bordered" style="font-size:9px;table-layout:fixed;width:100%;word-break:break-all;">
				<thead>
				<tr>
				<td>#</td>
				<td>NUMBER</td>
				<td>MEMBER ID</td>
				<td>TITLE</td>
				<td>NAME</td>
				<td>ADDRESS 1</td>
				<td>ADDRESS 2</td>
				<td>ADDRESS 3</td>
				<td>ADDRESS 4</td>
				<td>CITY</td>
				<td>PIN</td>

				<td>MAGRETURN</td>
				<td>STOPMAIL</td>
				<td>DESTFILE</td>
				<td>EXPIRED</td>
				<td>LASTUPDT</td>
				<td>TOMON</td>
				<td>TOYR</td>
				<td>HANDDELV</td>
			</tr>
				</thead>
				<tbody class="tbody">
		';
		foreach ($query->result() as $key=>$row) {
			$output.='<tr>
						<td>'.($key+1).'</td>
						<td>'.$row->NUMB .'</td>
						<td>'.$row->t_member .'</td>
						<td>'.$row->TITLE .'</td>
						<td>'.$row->NAME .'</td>
						<td>'.$row->ADDR1 .'</td>
						<td>'.$row->ADDR2 .'</td>
						<td>'.$row->ADDR3 .'</td>
						<td>'.$row->ADDR4 .'</td>
						<td>'.$row->CITY .'</td>
						<td>'.$row->PIN .'</td>

						<td>'.$row->MAGRETURN .'</td>
						<td>'.$row->STOPMAIL .'</td>
						<td>'.$row->DESTFILE .'</td>
						<td>'.$row->EXPIRED .'</td>
						<td>'.$row->LASTUPDT .'</td>
						<td>'.$row->TOMON .'</td>
						<td>'.$row->TOYR .'</td>
						<td>'.$row->HANDDELV .'</td>
					  </tr>';
		}
		$output.='</tbody></table>';
		return $output;
	
	}

}
?>