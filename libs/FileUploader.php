<?php
    define("UPLOAD_DIR",'uploads/');
    define("UPLOAD_PATH",'E:\PhpstormProjects\theschool\uploads\\');

    class FileUploader
    {
        // privet members.
        private $allowedFormats = ['png','jpeg','jpg','gif'];
        private $allowedSize = 5000000;
        private $errorsFile = [];
        private $file = null;
        private $newFileName;
        private $fileName;
        private $fileTmpName;
        private $fileSize;
        private $fileError;
        private $fileType;

        //getters and setters.

        /**
         * FileUploader constructor.
         * @param $file
         */
        public function __construct($file = NULL)
        {

            if($file != null){
                $this->file = $file;
                $this->fileName = $file['name'];
                $this->fileTmpName = $file['tmp_name'];
                $this->fileSize = $file['size'];
                $this->fileError = $file['error'];
                $this->fileType = $file['type'];
                $this->uploadFile($this->file);
            }
        }

        /**
         * @return array
         */
        public function getAllowedFormats(): array
        {
            return $this->allowedFormats;
        }

        /**
         * @param array $allowedFormats
         */
        public function setAllowedFormats(array $allowedFormats): void
        {
            $this->allowedFormats = $allowedFormats;
        }

        /**
         * @return int
         */
        public function getAllowedSize(): int
        {
            return $this->allowedSize;
        }

        /**
         * @param int $allowedSize
         */
        public function setAllowedSize(int $allowedSize): void
        {
            $this->allowedSize = $allowedSize;
        }

        /**
         * @return array
         */
        public function getErrorsFile(): array
        {
            return $this->errorsFile;
        }

        /**
         * @param array $errorsFile
         */
        public function setErrorsFile(array $errorsFile): void
        {
            $this->errorsFile = $errorsFile;
        }

        /**
         * @return mixed
         */
        public function getFile()
        {
            return $this->file;
        }

        /**
         * @param mixed $file
         */
        public function setFile($file): void
        {
            $this->file = $file;
        }

        /**
         * @return mixed
         */
        public function getNewFileName()
        {
            return $this->newFileName;
        }

        /**
         * @param mixed $newFileName
         */
        public function setNewFileName($newFileName): void
        {
            $this->newFileName = $newFileName;
        }

        /**
         * @return mixed
         */
        public function getFileName()
        {
            return $this->fileName;
        }

        /**
         * @param mixed $fileName
         */
        public function setFileName($fileName): void
        {
            $this->fileName = $fileName;
        }

        /**
         * @return mixed
         */
        public function getFileTmpName()
        {
            return $this->fileTmpName;
        }

        /**
         * @param mixed $fileTmpName
         */
        public function setFileTmpName($fileTmpName): void
        {
            $this->fileTmpName = $fileTmpName;
        }

        /**
         * @return mixed
         */
        public function getFileSize()
        {
            return $this->fileSize;
        }

        /**
         * @param mixed $fileSize
         */
        public function setFileSize($fileSize): void
        {
            $this->fileSize = $fileSize;
        }

        /**
         * @return mixed
         */
        public function getFileError()
        {
            return $this->fileError;
        }

        /**
         * @param mixed $fileError
         */
        public function setFileError($fileError): void
        {
            $this->fileError = $fileError;
        }

        /**
         * @return mixed
         */
        public function getFileType()
        {
            return $this->fileType;
        }

        /**
         * @param mixed $fileType
         */
        public function setFileType($fileType): void
        {
            $this->fileType = $fileType;
        }


        /**
         * function upload files.
         */
        public function uploadFile()
        {
            if(file_exists(UPLOAD_PATH)){
                try{
                    $fileExtension = explode('.', $this->fileName);
                    $fileActualExtension = strtolower(end($fileExtension));

                    if(in_array($fileActualExtension, $this->allowedFormats)){
                        if($this->fileError === 0){
                            if($this->fileSize < $this->allowedSize){
                                $this->newFileName = uniqid('', true) . "." . $fileActualExtension;
                                $fileDestination = UPLOAD_DIR . $this->newFileName;
                               try{
                                   move_uploaded_file($this->fileTmpName, $fileDestination);
                               }catch(RuntimeException $e){
                                   throw new RuntimeException("can't move file file");
                               }

                            }else{
                                $this->errorsFile[] = "file is too big";
                            }
                        }else{
                            $this->errorsFile[] = 'there was an error uploading your file';
                        }
                    }else{
                        $this->errorsFile[] = 'file not supported type';
                    }
                }catch(RuntimeException $e){
                    throw new RuntimeException("no file");
                }
            }else{
                $this->errorsFile[] = 'no file';
            }
        }

        /**
         * function get file path and deleting file.
         * @param $path
         */
        function deleteFile($path){
            if (file_exists(UPLOAD_PATH.'/'.$path))
            {
                try{
                    unlink (UPLOAD_PATH.'/'.$path);
                }catch(RuntimeException $e)
                {
                    throw new RuntimeException("Can not delete file");
                }
            }
        }
    }