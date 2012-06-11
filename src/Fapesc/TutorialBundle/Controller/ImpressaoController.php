<?php
namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Usuario;
use mpdf\mPDF;
use HTML;
//use app\Resources\views\mpdf\mPDF;

class ImpressaoController extends FapescController
{
	/**
	* @Route("/relatorio/{idRelatorio}/impressao")
	* @Template("FapescTutorialBundle:Impressao:impressao.html.twig")
	*/
	public function impressaoAction($idRelatorio)
	{	
		$dados["idRelatorio"] = $idRelatorio;
		return array_merge($this->usuario(), $this->menu("relatorio", "impressao", $idRelatorio), $this->info($this->findRelatorio($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
	}

	/**
	* @Route("/relatorio/{idRelatorio}/imprimir")
	*/
	public function imprimirAction($idRelatorio)
	{	
		$mpdf = $this->imprimeRelatorio($idRelatorio);
		$relatorio = $this->getDoctrine()->getRepository("FapescTutorialBundle:Relatorio")->find($idRelatorio);
		$projeto = $relatorio->getProjeto();
		$arquivo = $projeto->getTitulo()."-".$relatorio->getNota()."-".$relatorio->getLiberacao()."-".$relatorio->getRubrica(true);
		return new Response($mpdf->Output($arquivo,'D')); 
	}
	private function findRelatorio($idRelatorio)
	{
		$relatorio = $this->getDoctrine()
			->getRepository("FapescTutorialBundle:Relatorio")
			->find($idRelatorio);
		if (!is_object($relatorio))
			throw new Exception("Relatório inválido!");
		//@TODO assegurar somente [relatórios > projetos > usuário]

		return $relatorio;
	}

	private function imprimeRelatorio($idRelatorio)
	{
		$relatorio = $this->getDoctrine()
		->getRepository("FapescTutorialBundle:Relatorio")
		->find($idRelatorio);
		$projeto = $relatorio->getProjeto();
		define('_IMPRESSAO','../src/Fapesc/TutorialBundle/Resources/views/Impressao/');

		require_once("../vendor/mpdf/mPDF.php");

		$mpdf = new \mPDF('pt','A4',12,'',8,8,51,20,9,9);
		$mpdf->SetDisplayMode('fullpage');
		$paginas = array ("00-cabecalho",
				  "00-rodape",
				  "00-geral",
				  "00-capa",
				  "01-carta",
				  "09-relatorio1",			
				  "09-relatorio2",
				  "09-relatorio3",			
				  "02-planoAplicacao",		
				  "03-contrapartida",
				  "05-dispendioFiscal",
				  "06-dispendioDiarias",
				  "07-dispendioPagamento",
				  "07-declaracaoDiarias",		
				  "08-dispendioPrecos",
				  "paginaBranca",
				  "conciliacao",	);	
		foreach ($paginas as $key => $value){
			if($value == "05-dispendioFiscal")
				$value = "05-dispendio";
			$stylesheet = file_get_contents(_IMPRESSAO.'CSS/'.$value.'.css');
			$mpdf->WriteHTML($stylesheet,1);
		}
		$cabecalho = array(
				"projeto" => $projeto->getTitulo(),
				"coordenador" => $projeto->getUsuario()->getNome(),
				"contrato" => $projeto->getContrato(),
				"empenho" => $relatorio->getNota(),
				"chamada" => $projeto->getChamada(),
			    );
		
		$cabecalho = $this->escreve("00-cabecalho",$cabecalho);
		$mpdf->SetHTMLHeader($cabecalho);
		$rodape = $this->escreve("00-rodape",array());
		$mpdf->SetHTMLFooter($rodape);
		$paginasssssssssssssssss = $this->criaPaginas($idRelatorio);
		foreach($paginasssssssssssssssss as $value){
			if($value[1]){
				$mpdf->SetHTMLHeader(null);
				$mpdf->WriteHTML($value[0],2);
				$mpdf->SetHTMLHeader($cabecalho);
			}
			else{
				$mpdf->AddPage();
				$mpdf->WriteHTML($value[0],2);
			}

		}
		return $mpdf;
	}
private function escreve($pagina,$dados){
	define('_IMPRESSAO','../src/Fapesc/TutorialBundle/Resources/views/Impressao/');
	$content = file_get_contents(_IMPRESSAO. $pagina . ".html");
	ob_start(); // Inicia o fluxo
		//Escreve a página
		echo "<body>" ;
			$content = file_get_contents(_IMPRESSAO. $pagina . ".html");
			//Substituição das váriaveis
				foreach ($dados as $key => $value)
					$content = str_replace("{{ " . $key . " }}", $value, $content);
			//Fim da substituição
		echo $content;
		echo "</body>" ;
		//Termina escrita
	$html = ob_get_contents(); // Pega o conteúdo escrito
	ob_end_clean();// Finaliza o fluxo e limpa o buffer
	return $html;

}
	private function criaPaginas($idRelatorio){
		$relatorio = $this->getDoctrine()
		->getRepository("FapescTutorialBundle:Relatorio")
		->find($idRelatorio);
		$projeto = $relatorio->getProjeto();
		$paginas = array();
		$dados = array();

		$dados = array(//00-capa
				"tipo" => strtoupper($relatorio->getTipo(true)),
				"chamada" => $projeto->getChamada(),
				"contrato" => $projeto->getContrato(),
				"empenho" => $relatorio->getNota(),
				"projeto" => $projeto->getTitulo(),
				"coordenador" => $projeto->getUsuario()->getNome(),
				"instituicao" =>  $projeto->getUsuario()->getInstituicao(),
				"data" => date("d/m/Y"),
			);
		$paginas[] = array(0 => $this->escreve("00-capa",$dados) , false);
		$dados = array(//01-carta
				"nome" => $projeto->getUsuario()->getNome(),
				"data" => date("d/m/Y"),
				"projeto" => $projeto->getTitulo(),
				"contrato" => $projeto->getContrato(),
				"empenho" => $relatorio->getNota(),
				"chamada" => $projeto->getChamada(),
				"coordenador" => $projeto->getUsuario()->getNome(),
			);
		$paginas[] = array(0 => $this->escreve("01-carta",$dados) , false);
		$dados = array(//09-relatorio1
				"projeto" => $projeto->getTitulo(),
				"coordenador" => $projeto->getUsuario()->getNome(),
				"parte" => "II",
				"area" => $projeto->getArea(),
				"local" => $projeto->getMunicipio()."/" . $projeto->getRegiao() . "/" . $projeto->getSdr(),
				"instituicao" => $projeto->getUsuario()->getInstituicao(),
				"valorTotal" => $projeto->getOrcamento(),
				"inicio" =>  $projeto->getInicio()->format("d/m/Y"),
				"dataRelatorio" => "#definir",
				"dataParcela" => "#definir",
				"partipacaoTotal" => "#definir",
				"partipacaoCusteio" => "#definir",
				"partipacaoCapital" => "#definir",
				"resumo" => $projeto->getResumo(),
			);
		$paginas[] = array(0 => $this->escreve("09-relatorio1",$dados) , false);
		$dados = array(//09-relatorio2
				"tabela" => $this->geraRelatorio($relatorio),
			);
		

		$paginas[] = array(0 => $this->escreve("09-relatorio2",$dados) , false);
		$dados = array(//09-relatorio3
				"dataExtenso" => $projeto->getMunicipio().", ".date("d/m/Y"),
				"coordenador" => $projeto->getUsuario()->getNome(),
				"resultado" => $relatorio->getResultado(),
				"justificativa" => $relatorio->getJustificativa(),
				"dificuldade" => $relatorio->getDificuldade(),
				"alteracao" => $relatorio->getAlteracao(),
			);
		$paginas[] = array(0 => $this->escreve("09-relatorio3",$dados) , false);
		$msgs = array(
				0 => "Caro Coordenador, substitua esta folha pela cópia impressa do balancete TC28 referente à nota de liberação ".$relatorio->getNota(),

				"Caro Coordenador, substitua esta folha pela cópia impressa do termo de Outorga de número ". $projeto->getContrato() . ".",

				"Caro Coordenador, substitua esta folha pela cópia impressa do plano de trabalho aprovado do projeto ". $projeto->getTitulo(). ".",

				"Caro Coordenador, substitua esta folha pelo(s) originai(s) do(s) memorando(s) de alteração orçamentária, ordenados por ordem cronológica de encaminhamento. Importante: tais documentos devem conter o deferimento da Gerência de Projetos da FAPESC. Caso não existam alterações no plano de aplicação dos recursos, apenas descarte esta folha.",

				//"Caro Coordenador, cole aqui o extrato da conta bancária no. ". $projeto->getConta() ." / agência ". $projeto->getAgencia() . " - Banco " . $projeto->getBanco() . ". Caso a cópia impressa do extrato já esteja no formato A4, apenas substitua esta folha pelo referido documento.",

//				"Caro Coordenador, substitua esta folha pelo demonstrativo de rendimentos relativo à conta bancária no. ". $projeto->getConta() ." / agência ". $projeto->getAgencia() . " - Banco " . $projeto->getBanco() . ". Caso a cópia impressa do extrato já esteja no formato A4, apenas substitua esta folha pelo referido documento. Caso não existam rendimentos a serem declarados, apenas descarte esta folha.",
				
				6 => array(//conciliacao
						"conta" => "",
						"agencia" => "",
						"banco" => "",
						"data" => "",
						"valor" => "1",
						"nome" => $projeto->getUsuario()->getNome(),
						"cpf" => $projeto->getUsuario()->getCpf(),
						"tabela" => $this->geraConciliacao($relatorio),
						"total" => "",
						"saldo" => "",
				     ),
				
				//"Caro Coordenador, cole aqui o extrato da conta bancária no. ". $projeto->getConta() ." / agência ". $projeto->getAgencia() . " - Banco " . $projeto->getBanco() . ". Caso a cópia impressa do extrato já esteja no formato A4, apenas substitua esta folha pelo referido documento.",
			);
		for($i = 0 ; $i <= 7 ; $i++){
			if($i == 6)
				$paginas[] = array(0 => $this->escreve("conciliacao",$msgs[$i]) , false);	//conciliacao bancaria
			else
				$paginas[] = array(0 => $this->escreve("paginaBranca",array("textoPaginaBranca"=>$msgs[$i])) , true);
			
		}
		$dados = array(
				"tabela" => $this->geraPlanoAplicacao($idRelatorio),
			);
		$paginas[] = array(0 => $this->escreve("02-planoAplicacao",$dados) , false);
		$dados = array(
				"tabela" => $this->geraContrapartida($idRelatorio),
			);
		$paginas[] = array(0 => $this->escreve("03-contrapartida",$dados) , false);
		

		return $paginas;
	}
	function geraTabela($header,$dados,$footer,$class){
		//preenche linhas
		$qtdDados = sizeof($dados);
		if($qtdDados != 0){
			$qtdCol = sizeof($dados[0]);
			$linhas = $header;
			for($i = 0; $i < $qtdDados; ++$i){
			      	$linhas .= "<tr>";
				for($j = 0; $j < $qtdCol; ++$j){				
					//mostra conteudo da coluna
					$k = $class[$j];
					$classEscolhida = sizeof($k) == 0 ? '' : 'class='. "'" ."$k". "'";
					$linhas .= "  <td $classEscolhida>".$dados[$i][$j]."</td>";
				}
			       	$linhas .= "</tr>";
			}
			$linhas .= $footer;
		}
		return $linhas;
	}
	function geraRelatorio($relatorio){		
		foreach($relatorio->getProjeto()->getMetas() as $meta){			
			unset($resultadoR);
			unset($resultadoJ);
			foreach($relatorio->getResultados() as $resultado){
				if($resultado->getMeta()->getId() == $meta->getId()){
					$resultadoR = $resultado->getResultado(false);	
					$resultadoJ = $resultado->getJustificativa();			
					break;
				}				
			}
			$my_array[] = array($meta->getMeta(), $meta->getIndicador(), isset($resultadoR) ? $resultadoR : "NA", isset($resultadoJ) ? $resultadoJ : "Não se aplica");
		}
		$pagina = array(0 => "Relatorio");
		return $this->geraTabela($this->geraHeader($pagina),$my_array,$this->geraFooter($pagina),$this->geraClass($pagina));
	}
	function geraConciliacao($relatorio){
		$conciliacao = $relatorio->getConciliacao();
		if (is_object($conciliacao)){
			$cheques = $conciliacao->getCheques();
			foreach($cheques as $cheque){			
				$my_array[] = array($cheque->getNumero(), $cheque->getData(),"#definir" ,"R$ " . $cheque->getValor());
			}
		}
		$my_array[] = array("1","2","#definir" ,"3");
		$pagina = array(0 => "Conciliacao");
		return $this->geraTabela($this->geraHeader($pagina),$my_array,$this->geraFooter($pagina),$this->geraClass($pagina));
	}
	function geraContrapartida($idRelatorio){
		$contrapartida =  $this->dadosTabelas($idRelatorio,"Contrapartida");
		$totalContrapartida = $contrapartida[0];
		$contrapartida = $contrapartida[1];
		$my_array = array(
			/*maquinas*/		1 => $contrapartida[1],
			/*mobiliario*/		2 => $contrapartida[2],
			/*bibliografia*/	3 => $contrapartida[3],
			/*pessoaJuridica*/	4 => $contrapartida[4],
			/*pessoaFisica*/	5 => $contrapartida[5],
			/*diarias*/		6 => $contrapartida[6],
			/*passagens*/		7 => $contrapartida[7],
			/*bolsas*/		8 => $contrapartida[8],
		);
		$titulos = array(
				1 => array( 1 => "Equipamentos" , 2 => 5),
				2 => array( 1 => "Mobiliário" , 2 => 5),
				3 => array( 1 => "Bibliografia" , 2 => 5),
				4 => array( 1 => "Serviços – Pessoa Jurídica" , 2 => 3),
				5 => array( 1 => "Serviços – Pessoa Física" , 2 => 3),
				6 => array( 1 => "Passagens" , 2 => 6),				
				7 => array( 1 => "Diárias" , 2 => 5),
				8 => array( 1 => "Bolsas", 2 => 4),
		);
		$vazio = true;
		$i = 1;
		while($i <= 8  && $vazio){ //conta se existe algum item  pra evitar colocar  só titulo e nenhum dado
			 if(sizeof($my_array[$i]) != 0)
					$vazio = false;
				$i++;
		}
		if(!$vazio){
			$tabelas = "<p><h4> CONTRAPARTIDA </h4></p>";
			$header = array( 0 => "contrapartida");
			$footer = array( 0 => "contrapartida");
			$contaTit = 1;
			for($i = 1 ; $i <= 8 ; $i++){
				$qtdDados = sizeof($my_array[$i]);
				if($qtdDados != 0){
					$subTit = $titulos[$i];
					$tabelas .= "<h4>" ."$contaTit". "." . $subTit[1] . "</h4>";
					$contaTit++;
					$footer[1] = $subTit[2]-1;
					$header[1] = $subTit[2];
					$vtotal = $totalContrapartida[$i];
					$tabelas .= $this->geraTabela($this->geraHeader($header),$my_array[$i],$this->geraFooter($footer,$vtotal),$this->geraClass($header));
				}
			}
		}
		return isset($tabelas) ? $tabelas : "";

	}
	function geraPlanoAplicacao($idRelatorio){

		$dadosPlano = $this->dadosTabelas($idRelatorio,"Empenho");
		$total = $dadosPlano[0];
		$capital = $dadosPlano[1];
		$custeio = $dadosPlano[2];
		$capitalAtivo = $total[1][0] != 0;
		
		$my_array = array(
	/*capital*/		1 => array(
			/*maquinas*/		1 => $capital[1],
			/*mobiliario*/		2 => $capital[2],
			/*bibliografia*/	3 => $capital[3],
					  ),
	/*custeio*/		2 => array(
			/*pessoaJuridica*/	1 => $custeio[1],
			/*pessoaFisica*/	2 => $custeio[2],
			/*diarias*/		3 => $custeio[3],
			/*passagens*/		4 => $custeio[4],
			/*bolsas*/		5 => $custeio[5],
					  ),
	);
	$titulos = array(
			1 => array(
				1 => array( 1 => "Equipamentos" , 2 => 5) ,
				2 => array( 1 => "Mobiliário" , 2 => 5),
				3 => array( 1 => "Bibliografia" , 2 => 5) 
			),
			2 => array(
			 	1 => array( 1 => "Serviços – Pessoa Jurídica" , 2 => 3),
			  	2 => array( 1 => "Serviços – Pessoa Física" , 2 => 3),
			  	3 => array( 1 => "Diárias" , 2 => 5),
			  	4 => array( 1 => "Passagens" , 2 => 6),
			  	5 => array( 1 => "Bolsas", 2 => 4),
			),
	);
	$tabelas = "";
	$header = array( 0 => "planoAplicacao");
	$footer = array( 0 => "planoAplicacao");
	$i = $capitalAtivo ? 1 : 2;
	$tam = sizeof($my_array[$i]);
	$k = $titulos[$i];
	$contaSub = 1;
	$tabelas = "";
	for($j = 1 ; $j <= $tam ; $j++){
		$contDados = sizeof($my_array[$i][$j]);
		if($contDados != 0){
			$colunas = $k[$j];
			$subTitulo  = "<h4>";
			$subTitulo .= sizeof($my_array[$i]) != 1 ? "$contaSub" . "." . "$colunas[1]" : "";
			$subTitulo .= "</h4>";
			$contaSub++;
			$tabelas .= $subTitulo;
			$footer[1] = $colunas[2] - 1;
			$header[1] = $colunas[2];
			$vtotal = $total[$i][$j];
			$tabelas .= $this->geraTabela($this->geraHeader($header),$my_array[$i][$j],$this->geraFooter($footer,$vtotal),$this->geraClass($header));
		}
	}
	return $tabelas;
}

	function dadosTabelas($idRelatorio,$pagina){//$pagina = "Contrapartida" ou "Empenho"
		$contrapartida = array();
		$totalContrapartida = array(0,0,0,0,0,0,0,0,0);
		$capital = array();
		$custeio = array();
		$totalDispendio = array(1=>array(0,0,0,0),//capital ,[1]{[0] = Capital ; [1] = Equipamentos ; [2] = Bibliografia ; [3] = Mobiliario
				 	   array(0,0,0,0,0,0));//custeio , [2]{[0] = Custeio;[1] = PJ ;[2] = PF ;[3] = Diarias ;[4] = Passagens;[5]=Bolsa 		
		$itens = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:".$pagina)->findBy(array("relatorio" => $idRelatorio));
		if (!empty($itens)) {
		    foreach ($itens as $item) {
			$i = 1;
			$j = 0;
			$k = 0;
			$valor = 0;
			unset($dados);
		        switch ($item->getCategoria()) {
		            case "1": //dispendio
		                $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($item->getItem());
		                if (is_object($dispendio)) {
				    $valor = $dispendio->getTotal(true);
		                    switch ($dispendio->getCategoria()) {
		                        case "1": //bibliografia
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() , $dispendio->getQuantidade() , $dispendio->getUnitario(),"R$ ".$dispendio->getTotal());
				           $k = 3;
					   $i = 1;  $j = 3;
		                           break;
		                        case "2": //equipamento
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() , $dispendio->getQuantidade() , $dispendio->getUnitario(),"R$ ".$dispendio->getTotal());
				           $k = 1;
					   $i = 1;   $j = 1;
		                           break;
		                        case "3": //mobiliario
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() , $dispendio->getQuantidade() , $dispendio->getUnitario(),"R$ ".$dispendio->getTotal());
				           $k = 2;
					   $i = 1;   $j = 2;
		                           break;
		                        case "4": //pessoaFisica
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() ,"R$ ". $dispendio->getTotal());
					   $k = 5;
					   $i = 2;   $j = 2;
		                           break;
		                        case "5": //pessoaJuridica
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() ,"R$ ". $dispendio->getTotal());
					   $k = 4;
					   $i = 2;   $j = 1;
		                           break;
		                        case "6": //aluguel
		                           $dados = array($dispendio->getData() , $dispendio->getDescricao() , $dispendio->getQuantidade() , $dispendio->getUnitario(),"R$ ".$dispendio->getTotal());
					  $i = 2;    $j = 3;
		                           break;
		                        case "7": //material
		                            break;
		                    }
		                }
		                break;
		            case "2": //passagem
		                $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($item->getItem());
		                if (is_object($passagem)) {
				    $valor = $passagem->getValor(true);
				    $passagem = $passagem->toArray();
				    list($saida, $h) = explode(" ", $passagem["saida"]);
				    list($chegada, $h) = explode(" ", $passagem["chegada"]);
				    $dados = array($passagem["compra"] , $passagem["descricao"] , $saida , $chegada,"dataPag","R$ ".$passagem["total"]);
				    $k = 6;
				    $i = 2;   $j = 4;
			        }
		                break;
			    case "3": //bolsa
		                $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($item->getItem());
				if (is_object($bolsa)) {
				    $valor = $bolsa->getValor(true);
			            $bolsa = $bolsa->toArray();
		                    $periodo = $bolsa["inicio"] . " - " . $bolsa["fim"];
	                            $dados = array($bolsa["data"] , $bolsa["bolsista"]["nome"] , $periodo ,"R$ ".$bolsa["valor"]);
				    $k = 8;
				    $i = 2;   $j = 5;
		                }
		                break;	
		        }
			if(isset($dados)){
				if($pagina == "Contrapartida"){
					$totalContrapartida[$k] += $valor;
					$totalContrapartida[0] += $valor;
					$contrapartida[$k][] = $dados;
				}
				else{
					$totalDispendio[$i][0] += $valor;
					$totalDispendio[$i][$j] += $valor;
					if($i == 1)
					   	$capital[$j][] = $dados;
				        else
						$custeio[$j][] = $dados;
					$totalDispendio[0] += $valor;
				}
			}
			
		    }
		}
		if($pagina == "Contrapartida")
			for($i = 1 ; $i <= 8 ; $i++)
				$contrapartida[$i] = $this->bubbleSort($contrapartida[$i]);
		else{
			for($i = 1 ; $i <= 3 ; $i++)
				$capital[$i] = $this->bubbleSort($capital[$i]);
			for($i = 1 ; $i <= 5 ; $i++)
				$custeio[$i] = $this->bubbleSort($custeio[$i]);
		}
		$resposta = $pagina == "Contrapartida" ? array(0 => $totalContrapartida,$contrapartida) : array(0 => $totalDispendio,$capital,$custeio);
		return $resposta;
	}


	function geraHeader($pagina){
		$header = "";
		if($pagina[0] == "Relatorio"){
			$header = "<table border=1 width=100% cellspacing=0 bordercolor='#000'  style=border-collapse:'collapse'>
					<tr>
					<td class='centro'>	Meta		</td>
					<td class='centro'>	Indicador	</td>
					<td class='centro'>	Resultados	</td>
					<td class='centro'>	Observações	</td>
					</tr>";
		}
		if($pagina[0] == "Conciliacao"){
			$header = "<table border=1 width=100% cellspacing=0 bordercolor='#000'  style=border-collapse:'collapse'>
					<tr>
					<td class='numero'>		Número do cheque		</td>
					<td class='data'>		Data de emissão			</td>
					<td class='data'>		Data de compensação		</td>
					<td class='valorTitulo'>	Valor(R$)			</td>
					</tr>";
		}
		if($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida"){
			$header = "<table class='tabela1'> 
					<tr>
					<td class='data'>	Data 		    </td>
				  ";
			switch($pagina[1]){
				case 5:
					$header .="<td class='descricao5'>	Descrição dos itens </td>
					   	   <td class='qtd'>		Qtde.  		    </td>";
					$header .="<td class='vUnit'>		V. Unit.	    </td>";
					break;
				case 3:
					$header .= "<td class='descricao3'>	Descrição dos itens </td>";
					break;
				case 4:
					$header .= "<td class='bolsista'>	Bolsista       </td>
					    	    <td class='periodo'>	Período        </td>";
					break;
				case 6:
					$header .= "<td class='trecho'>	Trecho         </td>
						    <td class='data'>	Saida          </td>
					    	    <td class='data'>	Chegada        </td>
					    	    <td class='data'>	Data Pag. </td>";
					break;
			}
		   	$header .="<td class='vTotal'>			V. Total	    </td>";
		}
		return $header;
		
	
	}
	function geraFooter($pagina,$vTotal = 0){
		$footer = "";
		if($pagina[0] == "Relatorio"){
			$footer = "</table>";
		}
		if($pagina[0] == "Conciliacao"){
			$footer = "</table>";
		}
		if($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida"){
			$j = $pagina[1];
			$vTotal = "R$ ". number_format($vTotal, 2, ",", ".");
			$footer = "	  <tr>
						<td class='total' colspan ='$j'>		Total: 		    </td>
						<td class='vTotalFooter'>			$vTotal 	    </td>
					  </tr>
				   </table>";
		}
		return $footer;

	}
	function geraClass($pagina){
		$class = "";
		if($pagina[0] == "Relatorio"){
			$class = array( 0 => "esquerda" , "esquerda" , "centro" , "esquerda");
		}
		if($pagina[0] == "Conciliacao"){
			$class = array( 0 => "numero" , "data" , "data" , "valor");
		}
		if($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida"){
			switch($pagina[1]){
				case 5:
					$class = array( 0 => "data" , "itens" , "qtd" , "vUnit" , "vTotal" );	
					break;
				case 3:
					$class = array( 0 => "data" , "itens" , "vTotal" );
					break;
				case 4:
					$class = array( 0 => "data" , "bolsista", "periodo" , "vTotal" );
					break;
				case 6:
					$class = array( 0 => "data" , "trecho" , "data" ,"data" , "data" , "vTotal" );
					break;
			}
		}
		return $class;

	}
	function bubbleSort( $items ) {
		$temp = "";
		$size = sizeof( $items );
		for( $i = 1; $i < $size; $i++ ) 
			for( $j = 0; $j < $size - $i; $j++ ) 
				if( $items[$j+1] < $items[$j] ) {
					$temp = $items[$j];
					$items[$j] = $items[$j+1];
					$items[$j+1] = $temp;
				}
		return $items;
	}


}
