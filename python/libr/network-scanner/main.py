from scapy.all import ARP, Ether, srp

def scan_network(ip_range="192.168.1.0/24" ):
    # create ARP request
    arp = ARP(pdst=ip_range)
    ether = Ether(dst="ff:ff:ff:ff:ff:ff")
    packet = ether / arp

    result = srp(packet, timeout=2, verbose=0)[0]
    print(result)

    devices = []
    for sent, received in result:
        devices.append({'ip': received.psrc, 'mac': received.hwsrc})

    # return devices
    



if __name__ == "__main__":
    devices = scan_network()

