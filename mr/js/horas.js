function time()
{
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
setTimeout('time()',500);
}
function data(){
    Hoje = new Date();
    Data = Hoje.getDate();
    Dia = Hoje.getDay();
    Mes = Hoje.getMonth();
    Ano = Hoje.getFullYear();
   
    if(Data < 10) {
        Data = "0" + Data;
    }
    NomeDia = new Array(7),
    NomeDia[0] = "domingo",
    NomeDia[1] = "segunda-feira",
    NomeDia[2] = "terça-feira",
    NomeDia[3] = "quarta-feira",
    NomeDia[4] = "quinta-feira",
    NomeDia[5] = "sexta-feira",
    NomeDia[6] = "sábado",

    NomeMes = new Array(12),
    NomeMes[0] = "Janeiro",
    NomeMes[1] = "Fevereiro",
    NomeMes[2] = "Março",
    NomeMes[3] = "Abril",
    NomeMes[4] = "Maio",
    NomeMes[5] = "Junho",
    NomeMes[6] = "Julho",
    NomeMes[7] = "Agosto",
    NomeMes[8] = "Setembro",
    NomeMes[9] = "Outubro",
    NomeMes[10] = "Novembro",
    NomeMes[11] = "Dezembro",

    document.getElementById('datajs').innerHTML="Cariacica, "+ Data + " de " + NomeMes[Mes] + " de " + Ano;
}