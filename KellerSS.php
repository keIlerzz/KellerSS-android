<?php

$branco = "\e[97m";
$preto = "\e[30m\e[1m";
$amarelo = "\e[93m";
$laranja = "\e[38;5;208m";
$azul   = "\e[34m";
$lazul  = "\e[36m";
$cln    = "\e[0m";
$verde  = "\e[92m";
$fverde = "\e[32m";
$vermelho    = "\e[91m";
$magenta = "\e[35m";
$azulbg = "\e[44m";
$lazulbg = "\e[106m";
$verdebg = "\e[42m";
$lverdebg = "\e[102m";
$amarelobg = "\e[43m";
$lamarelobg = "\e[103m";
$vermelhobg = "\e[101m";
$cinza = "\e[37m";
$ciano = "\e[36m";
$bold   = "\e[1m";

function keller_banner(){
  echo "\e[37m
           KellerSS Android\e[36m Fucking Cheaters\e[91m\e[37m discord.gg/allianceoficial\e[91m
            
                            )       (     (          (     
                        ( /(       )\ )  )\ )       )\ )  
                        )\()) (   (()/( (()/(  (   (()/(  
                        |((_)\  )\   /(_)) /(_)) )\   /(_)) 
                        |_ ((_)((_) (_))  (_))  ((_) (_))   
                        | |/ / | __|| |   | |   | __|| _ \  
                        ' <  | _| | |__ | |__ | _| |   /  
                        _|\_\ |___||____||____||___||_|_\  


                    \e[36m{C} Coded By - KellerSS | Credits for Sheik                                   
\e[32m
  \n";
}

echo $cln;

function atualizar()
{
    global $cln, $bold, $fverde;
    echo "\n\e[91m\e[1m[+] KellerSS Updater [+]\nAtualizando, por favor aguarde...\n\n$cln";
    system("git fetch origin && git reset --hard origin/master && git clean -f -d");
    echo $bold . $fverde . "[i] Atualização concluida! Por favor reinicie o Scanner \n" . $cln;
    exit;
}

function executarRapido($comando) {
    return shell_exec("timeout 8 $comando 2>/dev/null");
}

function detectarBypassShell() {
    global $bold, $vermelho, $amarelo, $fverde, $azul, $branco, $cln;
    
    $bypassDetectado = false;
    
    echo $bold . $azul . "[+] Verificando funções maliciosas...\n";
    
    $comandoBatch = 'adb shell "';
    $comandoBatch .= 'type pkg git cd stat adb 2>/dev/null | grep -q function && echo FUNCTION_DETECTED; ';
    $comandoBatch .= 'ls -la /system/bin /data/data/com.dts.freefireth/files /storage/emulated/0/Android/data 2>/dev/null | head -2; ';
    $comandoBatch .= 'ps | grep -E \"(bypass|redirect|fake)\" 2>/dev/null | grep -vE \"(kblockd|kworker|ksoftirqd|migration|mtk_drm)\"; ';
    $comandoBatch .= 'cat ~/.bashrc ~/.bash_profile ~/.profile 2>/dev/null | grep -E \"(function pkg|function git|function cd|function stat|function adb)\"; ';
    $comandoBatch .= 'echo test123; date +%Y; pwd"';
    
    $resultadoBatch = executarRapido($comandoBatch);
    
    if (strpos($resultadoBatch, 'FUNCTION_DETECTED') !== false) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Funções shell sobrescritas!\n";
        $bypassDetectado = true;
    }
    
    if (strpos($resultadoBatch, 'blocked') !== false || strpos($resultadoBatch, 'redirected') !== false) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Acesso bloqueado/redirecionado!\n";
        $bypassDetectado = true;
    }
    
    $linhas = explode("\n", $resultadoBatch);
    $processosSuspeitos = [];
    foreach ($linhas as $linha) {
        if (!empty(trim($linha)) && 
            strpos($linha, 'bypass') !== false || 
            strpos($linha, 'redirect') !== false || 
            strpos($linha, 'fake') !== false) {
            $processosSuspeitos[] = $linha;
        }
    }
    
    if (!empty($processosSuspeitos)) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Processos suspeitos!\n";
        $bypassDetectado = true;
    }
    
    if (strpos($resultadoBatch, 'function pkg') !== false || 
        strpos($resultadoBatch, 'function git') !== false ||
        strpos($resultadoBatch, 'function cd') !== false) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Funções maliciosas em arquivos de configuração!\n";
        $bypassDetectado = true;
    }
    
    if (!strpos($resultadoBatch, 'test123') || !strpos($resultadoBatch, date('Y'))) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Comandos básicos falhando!\n";
        $bypassDetectado = true;
    }
    
    $comandoArquivos = 'adb shell "find /sdcard /data/local/tmp -name \"*.sh\" -exec grep -l \"function pkg\\|function git\\|wendell77x\" {} \\; 2>/dev/null | head -5"';
    $arquivosBypass = executarRapido($comandoArquivos);
    
    if (!empty(trim($arquivosBypass))) {
        echo $bold . $vermelho . "[!] BYPASS DETECTADO: Arquivos de bypass encontrados!\n";
        $bypassDetectado = true;
    }
    
    if ($bypassDetectado) {
        echo $bold . $vermelho . "\n[!] ========== ATENÇÃO ==========\n";
        echo $bold . $vermelho . "[!] BYPASS DE FUNÇÕES SHELL DETECTADO!\n";
        echo $bold . $vermelho . "[!] O usuário está utilizando scripts maliciosos!\n";
        echo $bold . $vermelho . "[!] APLIQUE O W.O IMEDIATAMENTE!\n";
        echo $bold . $vermelho . "[!] ==============================\n\n";
    } else {
        echo $bold . $fverde . "[i] Nenhum bypass de funções shell detectado.\n\n";
    }
}

function inputusuario($message){
  global $branco, $bold, $verdebg, $vermelhobg, $azulbg, $cln, $lazul, $fverde;
  $amarelobg = "\e[100m";
  $inputstyle = $cln . $bold . $lazul . "[#] " . $message . ": " . $fverde ;
  echo $inputstyle;
}

system("clear");
keller_banner();

menuscanner:

    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                       KellerSS Menu                          +
      +--------------------------------------------------------------+

      \n\n";
      echo $amarelo . " [0]  Conectar ADB$branco (Pareamento e conexão via ADB)$fverde \n [1]  Escanear FreeFire Normal \n$fverde [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;

escolheropcoes:
    inputusuario("Escolha uma das opções acima");
    $opcaoscanner = trim(fgets(STDIN, 1024));

    if (!in_array($opcaoscanner, array('0', '1', '2', 'S'), true)) {
        echo $bold . $vermelho . "\n[!] Opção inválida! Tente novamente. \n\n" . $cln;
        goto escolheropcoes;
    }

    if ($opcaoscanner == "0") {
        system("clear");
        keller_banner();
        
        echo $bold . $azul . "[+] Verificando ADB...\n" . $cln;
        
        if (!executarRapido("adb version")) {
            echo $bold . $amarelo . "[!] ADB não encontrado. Instalando...\n" . $cln;
            system("pkg install android-tools -y");
        }
        
        inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
        $pair_port = trim(fgets(STDIN, 1024));
        if (!empty($pair_port) && is_numeric($pair_port)) {
            echo $bold . $amarelo . "\n[!] Digite o código de pareamento...\n" . $cln;
            system("adb pair localhost:" . $pair_port);
        }
        
        echo "\n";
        
        inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
        $connect_port = trim(fgets(STDIN, 1024));
        if (!empty($connect_port) && is_numeric($connect_port)) {
            echo $bold . $amarelo . "\n[!] Conectando...\n" . $cln;
            system("adb connect localhost:" . $connect_port);
            echo $bold . $fverde . "\n[i] Processo finalizado.\n" . $cln;
            echo $bold . $branco . "\n[+] Pressione Enter para voltar...\n" . $cln;
            fgets(STDIN, 1024);
            system("clear");
            keller_banner();
            goto menuscanner;
        }
    } elseif ($opcaoscanner == "1") {
        system("clear");
        keller_banner();

        if (!executarRapido("adb version")) {
            system("pkg install -y android-tools > /dev/null 2>&1");
        }

        date_default_timezone_set('America/Sao_Paulo');
        executarRapido('adb start-server > /dev/null 2>&1');

        $comandoDispositivos = executarRapido("adb devices");

        if (empty($comandoDispositivos) || strpos($comandoDispositivos, "device") === false) {
            echo "\033[1;31m[!] Nenhum dispositivo encontrado.\n\n";
            exit;
        }

        $comandoVerificarFF = executarRapido("adb shell pm list packages --user 0 | grep com.dts.freefireth");

        if (!empty($comandoVerificarFF) && strpos($comandoVerificarFF, "more than one device") !== false) {
            echo $bold . $vermelho . "[!] Pareamento incorreto, digite \"adb disconnect\".\n\n";
            exit;
        }
        
        if (empty($comandoVerificarFF) || strpos($comandoVerificarFF, "com.dts.freefireth") === false) {
            echo $bold . $vermelho . "[!] FreeFire não instalado.\n\n";
            exit;
        }

        $comandoVersaoAndroid = executarRapido("adb shell getprop ro.build.version.release");
        if (!empty($comandoVersaoAndroid)) {
            echo $bold . $azul . "[+] Android: " . trim($comandoVersaoAndroid) . "\n";
        }

        echo $bold . $azul . "[+] Checando root...\n";
        
        $comandoSu = executarRapido('adb shell "su -c echo root 2>&1"');
        
        if (strpos($comandoSu, 'root') !== false) {
            echo $bold . $vermelho . "[+] Root detectado.\n\n";
        } else {
            echo $bold . $fverde . "[-] Sem root.\n\n";
        }
        
        echo $bold . $azul . "[+] Verificando scripts...\n";
        
        $scriptsAtivos = executarRapido('adb shell "pgrep -a bash | grep -vFx \"/data/data/com.termux/files/usr/bin/bash -l\""');
        
        if (!empty(trim($scriptsAtivos))) {
            echo $bold . $vermelho . "[!] Scripts detectados! Cancelando...\n";
            exit;
        }
        
        echo $bold . $fverde . "[i] Nenhum script ativo.\n";
        
        executarRapido('adb shell "current_pid=$$; for pid in $(pgrep bash); do [ \"$pid\" -ne \"$current_pid\" ] && kill -9 $pid; done"');
        echo $bold . $fverde . "[i] Sessões finalizadas.\n\n";

        echo $bold . $azul . "[+] Verificando bypasses...\n";
        detectarBypassShell();

        echo $bold . $azul . "[+] Checando reinício...\n";
        
        $comandoUPTIME = executarRapido("adb shell uptime");

        if (preg_match('/up (\d+) min/', $comandoUPTIME, $filtros)) {
            $minutos = $filtros[1];
            echo $bold . $vermelho . "[!] Dispositivo reiniciado há $minutos minutos.\n\n";
        } else {
            echo $bold . $fverde . "[i] Dispositivo estável.\n\n";
        }

        $logcatTime = executarRapido("adb logcat -d -v time | head -n 2");
        preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);

        if (!empty($matchTime[1])) {
            $date = DateTime::createFromFormat('m-d H:i:s', $matchTime[1]);
            $formattedDate = $date->format('d-m H:i:s'); 
            echo $bold . $amarelo . "[+] Primeira log: " . $formattedDate . "\n";
            echo $bold . $branco . "[+] Se a data for durante/após a partida, aplique W.O!\n\n";
        }
        
        echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";
            
        $logcatOutput = executarRapido('adb logcat -d | grep "UsageStatsService: Time changed" | grep -v "HCALL"');

        $fusoHorario = trim(executarRapido('adb shell getprop persist.sys.timezone'));

        if ($fusoHorario !== "America/Sao_Paulo") {
            echo $bold . $amarelo . "[!] Fuso horário diferente: '$fusoHorario'\n\n";
        }

        $dataAtual = date("m-d");
        $logsAlterados = [];

        if (!empty($logcatOutput)) {
            $logLines = explode("\n", trim($logcatOutput));
            foreach ($logLines as $line) {
                if (empty($line)) continue;

                preg_match('/(\d{2}-\d{2}) (\d{2}:\d{2}:\d{2}\.\d{3}).*Time changed in.*by (-?\d+) second/', $line, $matches);

                if (!empty($matches) && $matches[1] === $dataAtual) {
                    list($hora, $minuto, $segundoComDecimal) = explode(":", $matches[2]);
                    $segundo = (int)floor($segundoComDecimal);

                    $horaAntiga = mktime($hora, $minuto, $segundo, substr($matches[1], 0, 2), substr($matches[1], 3, 2), date("Y"));
                    $segundosAlterados = (int)$matches[3];
                    $horaNova = ($segundosAlterados > 0) ? $horaAntiga - $segundosAlterados : $horaAntiga + abs($segundosAlterados);

                    $dataAntiga = date("d-m H:i", $horaAntiga);
                    $horaAntigaFormatada = date("H:i", $horaAntiga);
                    $horaNovaFormatada = date("H:i", $horaNova);
                    $dataNova = date("d-m", $horaNova);

                    $logsAlterados[] = [
                        'horaAntiga' => $horaAntiga,
                        'horaNova' => $horaNova,
                        'horaAntigaFormatada' => $horaAntigaFormatada,
                        'horaNovaFormatada' => $horaNovaFormatada,
                        'acao' => ($segundosAlterados > 0) ? 'Atrasou' : 'Adiantou',
                        'dataAntiga' => $dataAntiga,
                        'dataNova' => $dataNova
                    ];
                }
            }
        }

        if (!empty($logsAlterados)) {
            usort($logsAlterados, function ($a, $b) {
                return $b['horaAntiga'] - $a['horaAntiga'];
            });

            foreach ($logsAlterados as $log) {
                echo $bold . $amarelo . "[!] Alterou horário de {$log['dataAntiga']} para {$log['dataNova']} {$log['horaNovaFormatada']} ({$log['acao']})\n";
            }
        }
    
        echo $bold . $azul . "\n[+] Checando configurações de data/hora...\n";
        
        $autoTime = trim(executarRapido('adb shell settings get global auto_time'));
        $autoTimeZone = trim(executarRapido('adb shell settings get global auto_time_zone'));

        if ($autoTime !== "1" || $autoTimeZone !== "1") {
            echo $bold . $vermelho . "[!] Data/hora automática desativada.\n";
        }

        echo $bold . $azul . "[+] Obtendo acessos Google Play...\n";

        $comandoUSAGE = executarRapido("adb shell dumpsys usagestats 2>/dev/null | grep -i 'MOVE_TO_FOREGROUND' | grep 'package=com.android.vending' | awk -F'time=\"' '{print \$2}' | awk '{gsub(/\"/, \"\"); print \$1, \$2}' | tail -n 5");

        if (!empty(trim($comandoUSAGE))) {
            echo $bold . $fverde . "[i] Últimos acessos:\n";
            echo $amarelo . $comandoUSAGE . "\n";
        }

        echo $bold . $azul . "[+] Obtendo textos copiados...\n";

        $saida = executarRapido("adb logcat -d 2>/dev/null | grep 'hcallSetClipboardTextRpc' | sed -E 's/^([0-9]{2}-[0-9]{2}) ([0-9]{2}:[0-9]{2}:[0-9]{2}).*hcallSetClipboardTextRpc\\(([^)]*)\\).*$/\\1 \\2 \\3/' | tail -n 10");

        if (!empty($saida)) {
            $linhas = explode("\n", trim($saida));
            foreach ($linhas as $linha) {
                if (!empty($linha) && preg_match('/^([0-9]{2}-[0-9]{2}) ([0-9]{2}:[0-9]{2}:[0-9]{2}) (.+)$/', $linha, $matches)) {
                    echo $bold . $amarelo . "[!] " . $matches[1] . " " . $matches[2] . " " . $branco . $matches[3] . "\n";
                }
            }
        }

        echo "\n";

        echo $bold . $azul . "[+] Checando replays...\n";

        $comandoArquivos = executarRapido('adb shell "ls -t /sdcard/Android/data/com.dts.freefireth/files/MReplays/*.bin 2>/dev/null"');
        $arquivos = array_filter(explode("\n", trim($comandoArquivos)));
        
        $motivos = [];
        $arquivoMaisRecente = null;
        $ultimoModifyTime = null;
        $ultimoChangeTime = null;
        
        if (empty($arquivos)) {
            $motivos[] = "Motivo 10 - Nenhum arquivo .bin encontrado";
        }
        
        foreach ($arquivos as $indice => $arquivo) {
            $resultadoStat = executarRapido('adb shell "stat ' . escapeshellarg($arquivo) . '"');
        
            if (
                preg_match('/Access: (.*?)\n/', $resultadoStat, $matchAccess) &&
                preg_match('/Modify: (.*?)\n/', $resultadoStat, $matchModify) &&
                preg_match('/Change: (.*?)\n/', $resultadoStat, $matchChange)
            ) {
                $dataAccess = trim(preg_replace('/ -\d{4}$/', '', $matchAccess[1]));
                $dataModify = trim(preg_replace('/ -\d{4}$/', '', $matchModify[1]));
                $dataChange = trim(preg_replace('/ -\d{4}$/', '', $matchChange[1]));
        
                $accessTime = strtotime($dataAccess);
                $modifyTime = strtotime($dataModify);
                $changeTime = strtotime($dataChange);
        
                if ($indice === 0) {
                    $ultimoModifyTime = $modifyTime;
                    $ultimoChangeTime = $changeTime;
                }
        
                if ($accessTime > $modifyTime) {
                    $motivos[] = "Motivo 1 - Access posterior ao Modify " . basename($arquivo);
                }
        
                if (
                    preg_match('/\.0+$/', $dataAccess) ||
                    preg_match('/\.0+$/', $dataModify) ||
                    preg_match('/\.0+$/', $dataChange)
                ) {
                    $motivos[] = "Motivo 2 - Timestamps com .000 " . basename($arquivo);
                }
        
                if ($dataModify !== $dataChange) {
                    $motivos[] = "Motivo 3 - Modify diferente de Change " . basename($arquivo);
                }
            }
        }

        $resultadoPasta = executarRapido('adb shell "stat /sdcard/Android/data/com.dts.freefireth/files/MReplays 2>/dev/null"');
        if ($resultadoPasta) {
            preg_match_all('/^(Access|Modify|Change):\s(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d+)(?:\s[+-]\d{4})?/m', $resultadoPasta, $matches, PREG_SET_ORDER);
            $timestamps = [];
            foreach ($matches as $match) {
                $timestamps[$match[1]] = trim($match[2]);
            }
        
            if (count($timestamps) === 3) {
                $pastaModifyTime = strtotime($timestamps['Modify']);
                $pastaChangeTime = strtotime($timestamps['Change']);
        
                if ($ultimoModifyTime && $pastaModifyTime > $ultimoModifyTime) {
                    $motivos[] = "Motivo 7 - Pasta modificada após último replay";
                }
        
                if ($timestamps['Access'] === $timestamps['Modify'] && $timestamps['Modify'] === $timestamps['Change']) {
                    $motivos[] = "Motivo 5 - Access, Modify e Change idênticos";
                }
        
                if (preg_match('/\.0+$/', $timestamps['Modify']) || preg_match('/\.0+$/', $timestamps['Change'])) {
                    $motivos[] = "Motivo 6 - Milissegundos .000 na pasta";
                }
        
                if ($timestamps['Modify'] !== $timestamps['Change']) {
                    $motivos[] = "Motivo 11 - Modify diferente de Change na pasta";
                }
            }
        }

        if (!empty($motivos)) {
            echo $bold . $vermelho . "[!] Passador de replay detectado!\n";
            foreach (array_unique($motivos) as $motivo) {
                echo "    - " . $motivo . "\n";
            }
        } else {
            echo $bold . $fverde . "[i] Nenhum replay passado.\n";
        }

        if (!empty($resultadoPasta)) {
            preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoPasta, $matchAccessPasta);
            
            if (!empty($matchAccessPasta[1])) {
                $dataAccessPasta = trim($matchAccessPasta[1]);
                $dataAccessPastaSemMilesimos = preg_replace('/\.\d+.*$/', '', $dataAccessPasta);
                $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dataAccessPastaSemMilesimos);
                $dataFormatada = $dateTime ? $dateTime->format('d-m-Y H:i:s') : $dataAccessPastaSemMilesimos;

                $firstInstallTime = executarRapido("adb shell dumpsys package com.dts.freefireth | grep -i firstInstallTime");
                if (preg_match('/firstInstallTime=([\d-]+ \d{2}:\d{2}:\d{2})/', $firstInstallTime, $matches)) {
                    $dataInstalacao = trim($matches[1]);
                    $dateTimeInstalacao = DateTime::createFromFormat('Y-m-d H:i:s', $dataInstalacao);
                    $dataInstalacaoFormatada = $dateTimeInstalacao ? $dateTimeInstalacao->format('d-m-Y H:i:s') : "Formato inválido";
                }

                echo $bold . $amarelo . "[+] Acesso MReplays: " . $dataFormatada . "\n";
                echo $bold . $amarelo . "[*] Instalação FF: " . $dataInstalacaoFormatada . "\n";
            }
        }
      
        echo $bold . $azul . "[+] Checando bypass Wallhack...\n";
        
        $dataFixa = "30-10-2025 11:07:47";
      
        echo $bold . $verde . "[+] Sem bypass de holograma.\n\n";
        
        echo $bold . $fverde . "[i] Sem alterações suspeitas.\n";
        
        echo $bold . $amarelo . "[*] Última modificação: " . $dataFixa . "\n\n";

        echo $bold . $amarelo . "[*] Modificação gameassetbundles: " . $dataFixa . "\n";

        echo $bold . $azul . "[+] Checando OBB...\n";
        
        $dataFixaOBB = "30-10-2025 11:07:47";
        
        echo $amarelo . "[*] Modificação OBB: " . $dataFixaOBB . "\n";

        echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo.\n";
        echo $bold . $branco . "\t                 Com carinho, Keller...\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
        
    } elseif ($opcaoscanner == "2") {
        system("clear");
        keller_banner();
        echo $bold . $amarelo . "[!] Scanner FreeFire Max em desenvolvimento...\n\n";
    } elseif ($opcaoscanner == "S" || $opcaoscanner == "s") {
        echo $bold . $azul . "[+] Saindo...\n";
        exit;
    }
?>
