server=`ps -aux | grep admin/award | grep -v grep`
        if [ ! "$server" ]; then
                cd /www/wwwroot/com_duobao_www
                nohup php index.php admin/award &
                echo "restart process success"
        fi