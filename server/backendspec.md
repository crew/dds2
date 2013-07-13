DDS Backend Spec
=============== 

##Accessing site
* Login through some authentication module
* use LDAP for us? And provide option to write / use your own plugins?
Involves:
  * User creation
  * User access restrictions
  * Sharing of access to slides---|
                                  |
##Slides                          |
* Assigning slides to other users-|
* Creating new decks (upload ect)
* Replace old slides in deck with new
* Editing settings of a deck (settings.json)


##Database needs
# people
* permissions
* groups

# slides:
* deck name
* deck id

# Hosts
Decks
Users


# Relationships
Groups > - < people
People > - - Deck



