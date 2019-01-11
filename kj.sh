server=`ps -aux | grep admin/award | grep -v grep`
        if [ ! "$server" ]; then
                cd /www/wwwroot/treasure
                nohup php index.php admin/award &
                echo "restart process success"
        fi