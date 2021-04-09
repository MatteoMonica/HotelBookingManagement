var pswToencrypt = "secretpassword";
function Encryption(message){
    var encrypted = CryptoJS.AES.encrypt(message,pswToencrypt);

}

function Decryption()
{
    var decrypted = CryptoJS.AES.decrypt(encrypted,pswToencrypt);
    return decrypted;
}
    
  