
default:
	@mkdir slides
	@mkdir queue
	@chmod 775 slides queue
	@chgrp www-data slides queue
	@chmod g+s slides queue

clean:
	@rm -rf queue/ slides/
