openssl genrsa -aes256 -out localCA.key 4096

openssl req -new -x509 -days 1095 -key localCA.key -out localCA.crt -subj "/CN=Local Development CA"

openssl genrsa -out localhost.key 2048

openssl req -new -key localhost.key -out localhost.csr -subj "/CN=localhost"

cat > localhost.ext << EOF
authorityKeyIdentifier=keyid,issuer
basicConstraints=CA:FALSE
keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment
subjectAltName = @alt_names

[alt_names]
DNS.1 = localhost
DNS.2 = 127.0.0.1
EOF

openssl x509 -req -in localhost.csr -CA localCA.crt -CAkey localCA.key -CAcreateserial -out localhost.crt -days 365 -sha256 -extfile localhost.ext
