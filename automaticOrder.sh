server=`ps -aux | grep '/www/wwwroot/treasure/cli.php admin/automaticOrder' | grep -v grep`
        if [ ! "$server" ]; then
                nohup php /www/wwwroot/treasure/cli.php admin/automaticOrder &
                echo "restart process success"
        fi