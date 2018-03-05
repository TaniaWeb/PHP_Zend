<?php
require_once 'User/Mail/class.phpmailer.php';

class MainSender
{
    public function sendMail($recv_address, $receiver, $user_info, $client_info)
    {
		$mail = new PHPMailer;
		$mail->Mailer = "smtp";
		// $mail->isSMTP();
		$mail->Host = "wp12525610.mailout.server-he.de";
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = "wp12525610-noreply";
		$mail->Password = "5eCUpbHF";
		$mail->SMTPSecure = 'tls';
		$mail->From = "noreply@aestheticpartner.de";
		$mail->FromName = "AestheticConfigurator";
		$mail->Subject = "Aestheticpartner Configuration";

		$style = '<style> 
			.hair4-desc {
			    font-size: 14px;
			    font-weight: bold;
			    text-align: left;
			    margin-bottom: 10px;
			}
			</style>';

		$header_section = '
		<table style="background-color:#EFEFEF; width:800px; padding: 60px 100px 100px 100px;">
			<tbody>
				<tr>
					<td style="vertical-align: middle; padding: 0px 0px 60px 0px;" align="center">
						<img src="http://83.169.4.108/img/logo.png">
					</td>
				</tr>
				<tr>
					<td align="center">
						<table style="background-color:#FFFFFF; width:600px; padding: 40px 40px 40px 40px;">
						<tbody>
							<tr>
							<td style="padding: 30px 30px 30px 30px; width:100%;" colspan="2">
								<table style="width:100%;">
								<tbody>
		';

		$footer_section = '
								</tbody>
								</table>
							</td>
							</tr>
						</tbody>
						</table>
					<td>
				</tr>
			</tbody>
		</table>
		';

		$client_section = '
			<tr>
				<td colspan="2" style="padding:0px; font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
					Kundendetails
				</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Datum der Konfiguration:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;" align="right">'.$client_info['date_last_saved'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Kundenname:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['clientname'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Geschlecht:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.($client_info['gender']?"male":"female").'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Telefon:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['phonenumber'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Email:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['email'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Address:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['street'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Underschrift:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right"><img src="http://83.169.4.108'.$client_info['signature'].'" style="height:40px;"></td>
			</tr>
			<tr>
				<td colspan="2" style="padding: 20px;" align="center">
					<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
				</td>
			</tr>
		';

		$customer_client_section = '
			<tr>
				<td colspan="2" style="padding:0px; font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
					Uber dich
				</td>
			</tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Datum der Konfiguration:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['date_last_saved'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Kundenname:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['clientname'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Geschlecht:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.($client_info['gender']?"male":"female").'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Telefon:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['phonenumber'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Email:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['email'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Address:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$client_info['street'].'</td>
			</tr>
			<tr>
				<td colspan="2" style="padding: 20px;" align="center">
					<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
				</td>
			</tr>
		';

		$config_section = '
			<tr>
				<td colspan="2" style="font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
					Konfiguration im Uberblick
				</td>
			</tr>
			<tr>
				<td colspan="2" style="font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
					<img src="http://83.169.4.108'.$client_info["points_image"].'">
				</td>
			</tr>
		';
		// style="width:450px;"
		$config = Zend_Json::decode($client_info["points"]);
		$count = 0;
		if($config != null && $config["objects"] != null)
		{
			$count = count($config["objects"])-1;
			for($i=1; $i<=$count; $i++)
			{
				$object = $config["objects"][$i];
				$sub_category = $object["sub_category"];

				$config_html = '
				<tr>
					<td colspan="2" style="font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
						<table style="width: 100%;">
							<tr><td style="width:10%" align="center">
								<div style="width: 29px !important; height: 29px !important; background-color: rgb(43, 176, 212); color: white; border-radius: 14.5px; font-size: 18px; line-height: 31px; text-align: center;">
				';
				$config_html .= $i.'</div></td>';
				$config_html .= '<td style="width:90%; height: 30px !important; font-size: 20px; text-align: left; color: #000000; font-weight: bold; vertical-align: top;" align="left" >';
				$config_html .= $object["description"].'</td></tr>';

				if($sub_category)
				{
					$config_html .= '<tr><td></td><td style="width:90%" align="left"><img style="width:40px;" src="http://83.169.4.108/img/';

					if(substr($sub_category, -4) == ".png")
						$config_html .= $sub_category.'"></td></tr>';
					else
						$config_html .= $sub_category.'.png"></td></tr>';

					$config_html .= '<tr><td></td><td style="width:90%; font-size: 14px; text-align: left; color: #000000;font-weight: bold;
" align="left">';
					$config_html .= $object["title"].'</td></tr>';
				}

				$config_html = $config_html.'
						</table>
					</td>
				</tr>
				';
				$object = $config["objects"][$i];

				$config_section .= $config_html;
			}
		}

		$count += 1;
		$hair_questions = Zend_Json::decode($client_info["hairQuestions"]);
		if($hair_questions!=null && $hair_questions["steps"]!=null && count($hair_questions["steps"])!=0)
		{
			$hair_html = '
			<tr>
				<td style="font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center" colspan="2">
					<table style="width: 100%;">
						<tr>
							<td style="width:10%; vertical-align: top;" align="center">
								<div style="width: 29px !important; height: 29px !important; background-color: rgb(246, 114, 114); color: white; border-radius: 14.5px; font-size: 18px;line-height: 31px; text-align: center;">'.$count.'</div></td>
							<td style="width:90%" align="left">
			';

			$hair_html .= '
				<table>
					<tr>
						<td class="height: 30px !important; font-size: 20px; text-align: left; color: #000000; font-weight: bold; vertical-align: top;">Haut & Haare</td>
					</tr>
			';

			for($i=0; $i<count($hair_questions["steps"]); $i++)
			{
				$steps = $hair_questions["steps"][$i];

				$hair_item_html = '
					<tr>
						<td style="height: 29px !important; color: rgb(255, 100, 100); font-size: 16px; line-height: 31px; text-align: left; margin-top: 4px; margin-bottom: -10px;">'.$steps["name"].'</td>
					</tr>
				';

				for($j=0; $j<count($steps["categories"]); $j++)
				{
					$category = $steps["categories"][$j];
					$category_html = '
						<tr>
							<td style="color: rgb(182, 188, 189); font-size: 16px; text-align: left;">'.$category["name"].'</td>
						</tr>
					';

					$subCategories_html = '
						<tr>
							<td>
								<table style="width:100%;">
					';

					$k1 = 0;
					$sub_count = 0;
					for($k=0; $k<count($category["subCategories"]); $k++)
					{
						$subCategory = $category["subCategories"][$k];
   			            
						if($subCategory["selected"] == false)
   			            	continue;

						$subCategory_html = '';
						if($i!=3)
						{
							if($k1%2==0)
							{
								$subCategory_html = '<tr><td style="width:48%;">';
							}
							else
							{
								$subCategory_html = '<td style="width:4%"></td><td style="width:48%; border:1px;">';	
							}
							$subCategory_html .= '<table style="border: 2px solid #ebebeb; width:100%;"><tr><td style="width:20%; height:35px;">'.($i==2 && $j==2 ? '' : '<img style="height:32px;" src="http://83.169.4.108/img/image_hair_'.($i+1).'_'.($j+1).'_'.($k+1).'.png">'). '</td>';
							$subCategory_html .= '<td style="width:80%; font-size: 14px; font-weight: bold;">'.$subCategory["name"]
								.'</td></tr></table>';

							$subCategory_html .= '</td>';
							if($k1%2==1)
								$subCategory_html .= '</tr>';
						}
						else
						{
							$sub_count += 1;
							$subCategory_html = '
								<tr>
									<td>
										<table style="width:100%;">
											<tr>
												<td style="width:10%; vertical-align: top;" align="center">
													<div style="width: 20px !important; height: 20px !important; background-color: rgb(255, 100, 100); color: white; border-radius: 10px; font-size: 16px; line-height: 22px; text-align: center;">'.$sub_count.'</div></td>
												<td style="width:90%" align="left">
							';

							$subCategory_html .= '
								<table>
									<tr>
										<td style="font-size: 14px; font-weight: bold; text-align: left; margin-bottom: 10px;">'.$subCategory["name"].'</td>
									</tr>
							';

							$subCategory_html .= '
										</table>
									</td>
								</tr>
							';

							$subCategory_html .= '
											</td>
										</tr>
									</table>
								</td>
							</tr>
							';
						}

   			            $k1 += 1;

						$subCategories_html .= $subCategory_html;
					}

					if($k1%2==0 && $i!=3)
						$subCategories_html .= '</tr>';
					else if($i!=3)
						$subCategories_html .= '<td style="width:4%;"></td><td style="width:48%;"></td></tr>';

					$subCategories_html .= '
								</table>
							</td>
						</tr>
					';

					$category_html .= $subCategories_html;

					$hair_item_html .= $category_html;
				}
				// var_dump($hair_item_html);
				$hair_html .= $hair_item_html;
			}

			$hair_html .= '
				</table>
			';

			$hair_html .= '
							</td>
						</tr>
					</table>
				</td>
			</tr>
			';

			$config_section .= $hair_html;
		}

		$config_section .= '
			<tr>
				<td colspan="2" style="padding: 20px;" align="center">
					<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
				</td>
			</tr>
		';

		$config_edit_section_admin = '
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color:#3BB0D4; width: 250px; padding: 15px;">
						<a href="http://83.169.4.108/admin/customer/beautyConfiguration?client_id='.$client_info["id"].'&userid='.$user_info["id"].'" target="_blank" rel="noopener noreferrer" style="color:#ffffff; text-align:center; text-decoration:none">Konfiguration Drucken</a>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
			';

		$config_edit_section_user = '
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color:#3BB0D4; width: 250px; padding: 15px;">
						<a href="#" target="_blank" rel="noopener noreferrer" style="color:#ffffff; text-align:center; text-decoration:none">Konfiguration Drucken</a>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
			';

		$user_section = '
			<tr>
				<td colspan="2" style="font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" align="center">
					Konfiguration wurde durchgfuhrt von
				</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Name:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$user_info['fullname'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Telefon:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$user_info['phone_country'].' '.$user_info['phonenumber'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Email:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$user_info['username'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px; font-weight:bold; color:#969696; padding:10px 0px 10px 0px; width:50%;" align="left">Address:</td>
				<td style="font-size:16px; font-weight:bold; padding:10px 0px 10px 0px; width:50%;"  align="right">'.$user_info['street'].'</td>
			</tr>
			<tr>
				<td colspan="2" style="padding: 20px;" align="center">
					<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
				</td>
			</tr>
		';

		$copyright_section = '
				<tr>
					<td colspan="2" style="padding: 30px 0px 0px 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						@2017 AestheticPartner. All Rights Reserved
					</td>
				</tr>
		';

		$admin_header_section = '
				<tr> 
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:bold;" align="center">
						'.$user_info['fullname'].'
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						hat soeben eine Beauty Configuration erstellt.
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color:#3BB0D4; width: 250px; padding: 15px;">
						<a href="http://83.169.4.108/admin/index/index" target="_blank" rel="noopener noreferrer" style="color:#ffffff; text-align:center; text-decoration:none">Im Dashboard ansehen</a>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
		';

		$user_header_section = '
				<tr>
					<td colspan="2" align="center" style="padding:0px 0px 20px 0px; font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;">
						<img src="http://83.169.4.108'.$user_info["avatar"].'" style="width:41px;">
					</td>
				</tr>
				<tr> 
					<td colspan="2" style="padding: 0px; color:rgb(120, 125, 132); font-size:16px; font-weight:bold;" align="center">
						Hallo '.$user_info['fullname'].',
					</td>
				</tr>
				<tr> 
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:bold;" align="center">
					&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						du hast soeben den Kunden
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px 0px 20px 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						<table>
							<tr>
								<td style="font-weight:bold; color:black;">
									'.$client_info["clientname"].'
								</td>
								<td style="color:rgb(120, 125, 132);">
									folgreich konfiguriert.
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 20px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
		';

		$client_header_section = '
				<tr> 
					<td colspan="2" style="padding: 0px; color:rgb(120, 125, 132); font-size:16px; font-weight:bold;" align="center">
						Hallo '.$client_info["clientname"].',
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="padding: 10px 10px 10px 10px; font-size:16px; font-weight:bold; color:#37B1D3; padding:20px 0px 20px 0px; width:50%;" >
						<img src="http://83.169.4.108'.$client_info["image"].'" style="width:41px;">
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 10px 0px 0px 0px; color: black; font-size:16px; font-weight:bold; color: #787d84;" align="center">
						'.$user_info['fullname'].'
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px 0px 20px 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						hat soeben eine Beauty Configuration von ihnen erstellt.
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 40px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						Sie horen binnen 48 Stunden von uns
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						mit Informationen zu lhrem personlichen Termin mit
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 0px; font-size:16px; font-weight:normal; color: #787d84;" align="center">
						einen unserer AestheticPartner Beauty Experten.
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 40px 0px 10px 0px;" align="center">
						<div style="background-color: #d5d5d5; width: 70px; height: 2px;"></div>
					</td>
				</tr>
		';

		if($receiver=='admin')
		{
			$content = $header_section
					.$admin_header_section
					.$client_section
					.$config_section
					.$config_edit_section_admin
					.$user_section
					.$copyright_section
					.$footer_section;
		}
		elseif ($receiver=='user') 
		{
			$content = $header_section
					.$user_header_section
					.$client_section
					.$config_section
					.$config_edit_section_user
					.$copyright_section
					.$footer_section;
		}
		elseif ($receiver=='client')
		{
			$content = $header_section
					.$client_header_section
					.$config_section
					.$config_edit_section_user
					.$customer_client_section
					.$user_section
					.$copyright_section
					.$footer_section;
		}

		$mail->Body = $content;
		$mail->AddAddress($recv_address);
		$mail->isHtml();


		if(!$mail->send())
		{
			return false;
		}
		else
		{
			// var_dump("success");
			return true;
		}
    }
}
?>