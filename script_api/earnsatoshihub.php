<?php
define('host',['Earnsatoshihub','earnsatoshihub.xyz','']);
define('version','1.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
init();
ban();

Awal:
SaveCokUa();
ban();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "x-requested-with: XMLHttpRequest";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}

Function Login(){
    $r = get(web);
    $lg = Ambil($r,'<font class="text-success">','</font>',1);
    $coin = Ambil($r,'Current Bits Value <div class="text-warning"><b>','</b>',1);
    $b = Ambil($r,'Account Balance <div class="text-primary"><b>','</b>',1);
    $logout= Ambil($r,'<i class="fa fa-power-off"></i> ','</a>',1);
    if(!$logout){print k." Cookie Experied \r";sleep(2);unlink(cok);die;}
    print p." Login Success".r;sleep(2);
    print " ".w3."[".p.cpm[1].w3."]".p." Login   ".panah.p.$lg.n.
          " ".w3."[".p.cpm[1].w3."]".p." Balance ".panah.p.$b.p." / ".p.$coin.n.
          " ".p.line();
    Faucet:
    while(true){
        $r = get(web);

        $locked=Ambil($r,'<i class="fa fa-exclamation-triangle fa-fw"></i><br/>',' to be able to Roll',1);
        if(preg_match('/Bonus Roll Locked!/',$r)){print p." Bonus Roll Locked!.".p."You must visit 1 more Shortlinks today".n;die();}
        $time= Ambil($r,'id="claimTime">','</span>',1);
        if($time){
            if(strpos($time,"hour") !== false){
                $cektime=explode(' hour',$time)[0];
                tim(($cektime) * (3600+1800));goto Faucet;}
            if(strpos($time,"minutes") !== false){
                $cektime=explode(' minutes',$time)[0];
                tim(($cektime +1) * 60);goto Faucet;
            }else{
            $cektime=explode(' seconds',$time)[0];
            tim($cektime);
            }
        }
        $r=get(web);
        $token = Ambil($r,"var token = '","'",1);
        $data  = "a=getFaucet&$token&challenge=false&response=false";
        print post(web.'/system/ajax.php',$data); die;
        $r = json_decode($r,1);
        $sukses = $r["message"];
        $status = $r["status"];
        
        
        if($status == 200){
            $t = get(web);
            $b = Ambil($t,'Account Balance <div class="text-primary"><b>','</b>',1);
            $coin= Ambil($t,'Current Bits Value <div class="text-warning"><b>','</b>',1);
            $nub= Ambil($sukses,' Congratulations, your lucky number was ',' and you won ',1);
            $reward= Ambil($sukses,'and you won ','!',1);
            print " ".w2."[".p.cpm[1].w2."]".p." Lucky Number".panah.p.$nub.k." / ".p.$reward.n;
            print " ".w2."[".p.cpm[2].w2."]".p." Balance     ".panah.p.$b.k." / ".p.$coin.n;
            print " ".Line();
            
        }
    }
}
Login();
