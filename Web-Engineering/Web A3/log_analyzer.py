#!/usr/bin/env python3
import re
import sys
from collections import Counter

# Patterns to identify potential attacks
SQL_INJECTION_PATTERN = re.compile(r"('|%27)(\s)*(O|%4F|%6F)(\s)*(R|%52|%72)")
XSS_PATTERN = re.compile(r"(<|%3C)(\s)*(S|%53|%73)(\s)*(C|%43|%63)(\s)*(R|%52|%72)(\s)*(I|%49|%69)(\s)*(P|%50|%70)(\s)*(T|%54|%74)")
PATH_TRAVERSAL_PATTERN = re.compile(r"(\.\./|\.\.\\|%2e%2e%2f|%2e%2e\\)")
FILE_INCLUSION_PATTERN = re.compile(r"(http(s)?:)?//")

def analyze_log(log_file):
    attacks = Counter()
    ip_attacks = Counter()
    
    with open(log_file, 'r') as f:
        for line in f:
            # Check for attacks
            if SQL_INJECTION_PATTERN.search(line):
                attacks['SQL Injection'] += 1
                ip = line.split()[0]
                ip_attacks[ip] += 1
            elif XSS_PATTERN.search(line):
                attacks['XSS'] += 1
                ip = line.split()[0]
                ip_attacks[ip] += 1
            elif PATH_TRAVERSAL_PATTERN.search(line):
                attacks['Path Traversal'] += 1
                ip = line.split()[0]
                ip_attacks[ip] += 1
            elif FILE_INCLUSION_PATTERN.search(line):
                attacks['File Inclusion'] += 1
                ip = line.split()[0]
                ip_attacks[ip] += 1
    
    print("Attack Summary:")
    for attack, count in attacks.items():
        print(f"{attack}: {count}")
    
    print("\nTop Attacking IPs:")
    for ip, count in ip_attacks.most_common(5):
        print(f"{ip}: {count}")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python log_analyzer.py <log_file>")
        sys.exit(1)
    analyze_log(sys.argv[1])