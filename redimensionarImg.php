<?php 

function redimensionarImg ($foto, $ancho_f, $alto_f) {

	list($ancho_i,$alto_i,$nro_tipo)=getimagesize($foto);

	switch ($nro_tipo) {
		case '1': $img_inicial = imagecreatefromgif($foto);break;
		case '2': $img_inicial = imagecreatefromjpeg($foto);break;
		case '3': $img_inicial = imagecreatefrompng($foto);break;
		default:
			echo "imagen invalidad";break;
	}

	$ratio_ancho = $ancho_f/$ancho_i; 
	$ratio_alto = $alto_f/$alto_i;

	$ratio_max = max($ratio_ancho, $ratio_alto);

	$nvo_ancho = $ancho_i * $ratio_max;
	$nvo_alto = $alto_i * $ratio_max;

	$cortar_ancho = $nvo_ancho - $ancho_f;
	$cortar_alto = $nvo_alto - $alto_f;

	$desplazamiento = 0.5;

	$nueva_img = imagecreatetruecolor($ancho_f, $alto_f);

	imagecopyresampled($nueva_img, $img_inicial, -$cortar_ancho * $desplazamiento, -$cortar_alto * $desplazamiento, 0, 0, $ancho_f + $cortar_ancho, $alto_f + $cortar_alto, $ancho_i, $alto_i);

	imagedestroy($img_inicial);

	$calidad = 60;

	$nbr_img = time()."-".$foto;

	imagejpeg($nueva_img,'imagenes/'.$nbr_img, $calidad);
	chmod('imagenes/'.$nbr_img, 0777);

	return $nbr_img;
}

?>