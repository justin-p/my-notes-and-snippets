```powershell
New-ADOrganizationalUnit -Name Tenants


New-ADOrganizationalUnit -Name Dalton.nl -Path "OU=Tenants,DC=justin,DC=local"
New-ADOrganizationalUnit -Name Insula.nl -Path "OU=Tenants,DC=justin,DC=local"
New-ADOrganizationalUnit -Name PuisX.nl -Path "OU=Tenants,DC=justin,DC=local"


Set-ADForest -Identity justin.local -UPNSuffixes @{add="Dalton.nl"}
Set-ADForest -Identity justin.local -UPNSuffixes @{add="Insula.nl"}
Set-ADForest -Identity justin.local -UPNSuffixes @{add="PuisX.nl"}


$Session = New-PSSession -ConfigurationName EX01 -ConnectionUri http://EX01.justin.local/PowerShell/ -Authentication Kerberos
Import-PSSession $Session


New-AcceptedDomain -Name "Dalton.nl" -DomainName Dalton.nl -DomainType:Authoritative
New-AcceptedDomain -Name "Insula.nl" -DomainName Insula.nl -DomainType:Authoritative
New-AcceptedDomain -Name "PuisX.nl" -DomainName PuisX.nl -DomainType:Authoritative


New-GlobalAddressList -Name "Dalton.nl – GAL" -ConditionalCustomAttribute1 "Dalton.nl" -IncludedRecipients MailboxUsers -RecipientContainer "justin.local/Tenants/Dalton.nl"
New-GlobalAddressList -Name "Insula.nl – GAL" -ConditionalCustomAttribute1 "Insula.nl" -IncludedRecipients MailboxUsers -RecipientContainer "justin.local/Tenants/Insula.nl"
New-GlobalAddressList -Name "PuisX.nl – GAL" -ConditionalCustomAttribute1  "PuisX.nl" -IncludedRecipients MailboxUsers -RecipientContainer "justin.local/Tenants/PuisX.nl"


New-AddressList -Name "Dalton.nl - All Rooms" -RecipientFilter "(CustomAttribute1 -eq 'Dalton.nl') -and (RecipientDisplayType -eq 'ConferenceRoomMailbox')" -RecipientContainer "justin.local/Tenants/Dalton.nl"
New-AddressList -Name "Insula.nl - All Rooms" -RecipientFilter "(CustomAttribute1 -eq 'Insula.nl') -and (RecipientDisplayType -eq 'ConferenceRoomMailbox')" -RecipientContainer "justin.local/Tenants/Insula.nl"
New-AddressList -Name "PuisX.nl - All Rooms" -RecipientFilter "(CustomAttribute1 -eq 'PuisX.nl') -and (RecipientDisplayType -eq 'ConferenceRoomMailbox')" -RecipientContainer "justin.local/Tenants/PuisX.nl"


New-AddressList -Name "Dalton.nl – All Users" -RecipientFilter "(CustomAttribute1 -eq 'Dalton.nl') -and (ObjectClass -eq 'User')" -RecipientContainer "justin.local/Tenants/Dalton.nl"
New-AddressList -Name "Insula.nl – All Users" -RecipientFilter "(CustomAttribute1 -eq 'Insula.nl') -and (ObjectClass -eq 'User')" -RecipientContainer "justin.local/Tenants/Insula.nl"
New-AddressList -Name "PuisX.nl – All Users" -RecipientFilter "(CustomAttribute1 -eq 'PuisX.nl') -and (ObjectClass -eq 'User')" -RecipientContainer "justin.local/Tenants/PuisX.nl"


New-AddressList -Name "Dalton.nl – All Contacts" -RecipientFilter "(CustomAttribute1 -eq 'Dalton.nl') -and (ObjectClass -eq 'Contact')" -RecipientContainer "justin.local/Tenants/Dalton.nl"
New-AddressList -Name "Insula.nl – All Contacts" -RecipientFilter "(CustomAttribute1 -eq 'Insula.nl') -and (ObjectClass -eq 'Contact')" -RecipientContainer "justin.local/Tenants/Insula.nl"
New-AddressList -Name "PuisX.nl  – All Contacts" -RecipientFilter "(CustomAttribute1 -eq 'PuisX.nl') -and (ObjectClass -eq 'Contact')" -RecipientContainer "justin.local/Tenants/PuisX.nl"


New-AddressList -Name "Dalton.nl - All Groups" -RecipientFilter "(CustomAttribute1 -eq 'Dalton.nl') -and (ObjectClass -eq 'Group')" -RecipientContainer "justin.local/Tenants/Dalton.nl"
New-AddressList -Name "Insula.nl - All Groups" -RecipientFilter "(CustomAttribute1 -eq 'Insula.nl') -and (ObjectClass -eq 'Group')" -RecipientContainer "justin.local/Tenants/Insula.nl"
New-AddressList -Name "PuisX.nl - All Groups" -RecipientFilter "(CustomAttribute1 -eq 'PuisX.nl') -and (ObjectClass -eq 'Group')" -RecipientContainer "justin.local/Tenants/PuisX.nl"


New-OfflineAddressBook -Name "Dalton.nl" -AddressLists "Dalton.nl – GAL"
New-OfflineAddressBook -Name "Insula.nl" -AddressLists "Insula.nl – GAL"
New-OfflineAddressBook -Name "PuisX.nl" -AddressLists "PuisX.nl – GAL"


New-EmailAddressPolicy -Name "Dalton.nl - EAP" -RecipientContainer "justin.local/Tenants/Dalton.nl" -IncludedRecipients "AllRecipients" -ConditionalCustomAttribute1 "Dalton.nl" -EnabledEmailAddressTemplates "SMTP:%m@Dalton.nl","smtp:%g.%s@Dalton.nl"
New-EmailAddressPolicy -Name "Insula.nl - EAP" -RecipientContainer "justin.local/Tenants/Insula.nl" -IncludedRecipients "AllRecipients" -ConditionalCustomAttribute1 "Insula.nl" -EnabledEmailAddressTemplates "SMTP:%m@Insula.nl","smtp:%g.%s@Insula.nl"
New-EmailAddressPolicy -Name "PuisX.nl - EAP" -RecipientContainer "justin.local/Tenants/PuisX.nl" -IncludedRecipients "AllRecipients" -ConditionalCustomAttribute1 "PuisX.nl" -EnabledEmailAddressTemplates "SMTP:%m@PuisX.nl","smtp:%g.%s@PuisX.nl"


New-AddressBookPolicy -Name "Dalton.nl" -AddressLists "Dalton.nl – All Users", "Dalton.nl – All Contacts", "Dalton.nl - All Groups" -GlobalAddressList "Dalton.nl – GAL" -OfflineAddressBook "Dalton.nl" -RoomList "Dalton.nl - All Rooms"
New-AddressBookPolicy -Name "Insula.nl" -AddressLists "Insula.nl – All Users", "Insula.nl – All Contacts", "Insula.nl - All Groups" -GlobalAddressList "Insula.nl – GAL" -OfflineAddressBook "Insula.nl" -RoomList "Insula.nl - All Rooms"
New-AddressBookPolicy -Name "PuisX.nl" -AddressLists "PuisX.nl – All Users", "PuisX.nl  – All Contacts", "PuisX.nl - All Groups" -GlobalAddressList "PuisX.nl – GAL" -OfflineAddressBook "PuisX.nl" -RoomList "PuisX.nl - All Rooms"


$c = Get-Credential
$u = New-Mailbox -Name 'Jan Jong' -Alias 'Jan' -OrganizationalUnit 'justin.local/Tenants/Dalton.nl' -UserPrincipalName 'jan@Dalton.nl' -SamAccountName 'Jan' -FirstName 'Jan' -Initials '' -LastName 'Jong' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'Dalton.nl'
$u2 = New-Mailbox -Name 'Frank Jong' -Alias 'Frank' -OrganizationalUnit 'justin.local/Tenants/Dalton.nl' -UserPrincipalName 'Frank@Dalton.nl' -SamAccountName 'Frank' -FirstName 'Frank' -Initials '' -LastName 'Frank' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'Dalton.nl'
Set-Mailbox $u -CustomAttribute1 "Dalton.nl"
Set-Mailbox $u2 -CustomAttribute1 "Dalton.nl"



$c = Get-Credential
$u = New-Mailbox -Name 'Piet Paulis' -Alias 'Piet' -OrganizationalUnit 'justin.local/Tenants/Insula.nl' -UserPrincipalName 'Piet@Insula.nl' -SamAccountName 'Piet' -FirstName 'Piet' -Initials '' -LastName 'Paulis' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'Insula.nl'
$u2 = New-Mailbox -Name 'Klaas Paulis' -Alias 'Klaas' -OrganizationalUnit 'justin.local/Tenants/Insula.nl' -UserPrincipalName 'Klaas@Insula.nl' -SamAccountName 'Klaas' -FirstName 'Klaas' -Initials '' -LastName 'Paulis' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'Insula.nl'
$u3 = New-Mailbox -Name 'Ronald Rijn' -Alias 'Ronald' -OrganizationalUnit 'justin.local/Tenants/Insula.nl' -UserPrincipalName 'Ronald@Insula.nl' -SamAccountName 'Ronald' -FirstName 'Ronald' -Initials '' -LastName 'Rijn' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'Insula.nl'
Set-Mailbox $u -CustomAttribute1 "Insula.nl"
Set-Mailbox $u2 -CustomAttribute1 "Insula.nl"
Set-Mailbox $u3 -CustomAttribute1 "Insula.nl"


$c = Get-Credential
$u = New-Mailbox -Name 'Maatje Janse' -Alias 'Maatje' -OrganizationalUnit 'justin.local/Tenants/PuisX.nl' -UserPrincipalName 'Maatje@PuisX.nl' -SamAccountName 'Maatje' -FirstName 'Maatje' -Initials '' -LastName 'Janse' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'PuisX.nl'
$u2 = New-Mailbox -Name 'Daan Nelson' -Alias 'Daan' -OrganizationalUnit 'justin.local/Tenants/PuisX.nl' -UserPrincipalName 'Daan@PuisX.nl' -SamAccountName 'Daan' -FirstName 'Daan' -Initials '' -LastName 'Nelson' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'PuisX.nl'
$u3 = New-Mailbox -Name 'Nelleke Hooilaas' -Alias 'Nelleke' -OrganizationalUnit 'justin.local/Tenants/PuisX.nl' -UserPrincipalName 'Nelleke@PuisX.nl' -SamAccountName 'Nelleke' -FirstName 'Nelleke' -Initials '' -LastName 'Hooilaas' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'PuisX.nl'
$u4 = New-Mailbox -Name 'Ben Haren' -Alias 'Ben' -OrganizationalUnit 'justin.local/Tenants/PuisX.nl' -UserPrincipalName 'Ben@PuisX.nl' -SamAccountName 'Ben' -FirstName 'Ben' -Initials '' -LastName 'Haren' -Password $c.password -ResetPasswordOnNextLogon $false -AddressBookPolicy 'PuisX.nl'
Set-Mailbox $u -CustomAttribute1 "PuisX.nl"
Set-Mailbox $u2 -CustomAttribute1 "PuisX.nl"
Set-Mailbox $u3 -CustomAttribute1 "PuisX.nl"
Set-Mailbox $u4 -CustomAttribute1 "PuisX.nl"


Update-OfflineAddressBook -Identity "Dalton.nl"
Update-OfflineAddressBook -Identity "PuisX.nl"
Update-OfflineAddressBook -Identity "Insula.nl"
```