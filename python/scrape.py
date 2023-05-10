import requests
from bs4 import BeautifulSoup

# Prompt the user for the URL of the website to be scraped
# url = input("Enter the URL of the website you want to scrape: ")
url="https://choconutsworld.com/"
# Send a GET request to the website and retrieve its HTML content
response = requests.get(url)
html_content = response.text

# Parse the HTML content using BeautifulSoup
soup = BeautifulSoup(html_content, 'html.parser')

# Extract the text content you need from the parsed HTML content
output = soup.get_text()

# Print the extracted text
print(output)
#############
# import requests
# from bs4 import BeautifulSoup

# url = "https://choconutsworld.com/"
# response = requests.get(url)
# html_content = response.text
# soup = BeautifulSoup(html_content, 'html.parser')
# output = soup.get_text()

# # Save the output to a file
# with open('C:/Users/Hanien/Documents/output.txt', 'w') as file:
#     file.write(output)

# # Print a success message
# print("Scraping completed successfully.")



