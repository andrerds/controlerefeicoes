<?php
//PDF SCRIPT By EDSON - INTEGRATOR
define('FPDF_FONTPATH','fpdf/font/');
require_once('fpdf/fpdf.php');
define('DB','babyeat');
define('USER','root');
define('SENHA','123');
define('HOST','localhost');
date_default_timezone_set('Brazil/East');
$data_atual = date("Y-m-d");

// Data atual 19/07/2014
$data_mes = date("d/m/Y");

// Explode a barra e retorna três arrays
$data_mes = explode("/", $data_mes);

// Cria três variáveis $dia $mes $ano
list($dia, $mes, $ano) = $data_mes;

// Recria a data invertida
$data_mes = "$mes"; // atualizado em 19/08/2013
//Arquivo que se conecta com o banco de dados
//require_once("conexao.php");
class PDF extends FPDF
{
//Cabeçalho da página
function Header( )
{
//Logo
$this->Image('baby.png',15,2,33);
//Arial bold 15
$this->SetFont('Courier','B',15);
//Move para a direita
$this->Cell(80);
//Título
$this->Cell(30,25, utf8_decode('Relatório Babyeat') ,0,0,'C');
//Quebra de linha
$this->Ln(20);
}
//Rodapé da página
function Footer( )
{
$autor = 'by Andre';
 //Posição de 1.5 cm da borda inferior
$this->SetY(-15);
//Arial italic 8
$this->SetFont('Arial','I',8);
//Número da página
$this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
$this->Cell(0,10, $autor ,0,0,'C');
//name
$this->SetTextColor(0,0,255);
$this->SetFont('','U');
$this->SetY(-5);
$this->SetX(90);
$this->Write(5,'App Babyeat','http://www.rdsinfor.com/sis_babyeat');

}
}
//Criando um novo arquivo de PDF
//na classe, você pode definir a visualização (“L” em minúsculo) indica Paisagem,
//o default é Retrato, as medidas usadas na página e o formato
//da página: A3, A4 e etc
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages( );
//Abre o arquivo
$pdf->Open();
//Desabilita a quebra automática de páginas
$pdf->SetAutoPageBreak(true);
//Adiciona a primeira página
$pdf->AddPage();
//coloca o valor do eixo y na posição por página
$y_axis = 40;
//coloca a altura da linha
$row_height = 8;
//Imprime os títulos para a página atual
//coloca a cor de fundo
$pdf->SetFillColor(232,232,232);
//coloca o cor da fonte
$pdf->SetTextColor(0,0,160);
$pdf->SetFont('Helvetica','',12);
$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(180,$row_height, utf8_decode('Relatório de Totais - Todos os registros '),1,0,'C',1);
//adiciona a altura da linha seguinte
$y_axis = $y_axis + $row_height;
$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(50,$row_height,'Quant.ml',1,0,'C',1);
$pdf->Cell(50,$row_height,'Data',1,0,'C',1);
$pdf->Cell(40,$row_height,utf8_decode('Mês'),1,0,'C',1);
$pdf->Cell(40,$row_height,utf8_decode('Ano'),1,0,'C',1);
$y_axis = $y_axis + $row_height;
   
//seleciona os livros para serem mostrados no seu arquivo PDF
$conexao = mysql_connect(HOST,USER,SENHA)or die('Erro na conexão - '.mysql_error());
($conexao) ? mysql_select_db(DB, $conexao) : die(mysql_error());
$sql = "select * from total_ml  order by data desc";
$res = mysql_query($sql);
//Inicializa o contador
 
while($row = mysql_fetch_array($res)){
//Se a linha atual é da próxima página, é criada uma nova página e é
//impressa os títulos novamente
 
//coloca o efeito zebra nas linhas
 
$pdf->SetFillColor(255,255,255);
 
$pdf->SetFillColor(245,245,245);

$data_mysql =  $data = $row['data'];
$timestamp = strtotime($data_mysql);
$tml = $row['tml'];
$data = $row['data'];
$mes = $row['mes'];
$ano = $row['ano'];
//coloca a cor da fonte
$pdf->SetTextColor(0,0,0);
$pdf->SetY($y_axis);
$pdf->SetX(15);

//adiciona os valores do banco nas células
$pdf->Cell(50,$row_height,$tml,1,0,'C',0);
$pdf->Cell(50,$row_height,date('d-m-Y', $timestamp),1,0,'C',0);
$pdf->Cell(40,$row_height,$mes,1,0,'C',0);
$pdf->Cell(40,$row_height,$ano,1,1,'C',0);
//vai para a próxima linha
$y_axis = $y_axis + $row_height;

} 
$pdf->AddPage(); 
 //$pdf->AddPage();   // SE ULTRAPASSADO, É ADICIONADO UMA PÁGINA  
$doc = $data_atual ." - Rel_babyeat.pdf";

  // SE ULTRAPASSADO, É ADICIONADO UMA PÁGINA  
//abaixo você tem a possibilidade de enviar para o browser para salvar como
//$pdf->Output('arquivo.pdf','D');
//o exemplo abaixo é para ser exibido diretamente no browser
$pdf->Output("$doc",'I');//abre o plug-in padrão do PDF para visualizar o arquivo de saída
Header('Pragma: public'); //Deve ser colocado para exibição no Internet Explorer