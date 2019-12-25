import os
import logging
from dotenv import load_dotenv
import pysftp

# Increased verbosity for .env
load_dotenv(verbose=True)
# load .env 
HOST = os.getenv("HOST")
PORT = int(os.getenv("PORT"))
SFTP_USERNAME = os.getenv("SFTP_USERNAME")
SFTP_PASSWORD = os.getenv("SFTP_PASSWORD")
LOCAL_FILE = os.getenv("LOCAL_FILE")
REMOTE_FILE = os.getenv("REMOTE_FILE")
REMOTE_PATH = os.getenv("REMOTE_PATH")
SLEEP_TIME = int(os.getenv("SLEEP_TIME"))

# logging config
logging.basicConfig(format='%(asctime)s %(levelname)-8s %(message)s', level=logging.INFO, datefmt='%Y-%m-%d %H:%M:%S')

# !!! NOT ADVISED --> disables host key checking for pysftp
cnopts = pysftp.CnOpts()
cnopts.hostkeys = None
try:
    with pysftp.Connection(HOST, port=PORT, username=SFTP_USERNAME, password=SFTP_PASSWORD,cnopts=cnopts) as sftp:
        logging.info('Connection successfull')
        data = sftp.listdir()
        logging.info(f"Remote files: {data}")
        logging.info(f"Removing {LOCAL_FILE}")
        sftp.remove(LOCAL_FILE)
        data = sftp.listdir()
        logging.info(f"Remote files: {data}")  
        logging.info(f"Uploading {LOCAL_FILE}")      
        sftp.put(LOCAL_FILE)
        data = sftp.listdir()
        logging.info(f"Remote files: {data}")
except Exception:
    logging.exception("message")
    pass