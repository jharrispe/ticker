<?xml version="1.0" encoding="UTF-8"?>
<rss
	xmlns:wsj="http://dowjones.net/rss/"
	xmlns:dj="http://dowjones.net/rss/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
	<channel>
		<title>WSJ.com: Markets</title>
		<link>http://online.wsj.com</link>
		<atom:link type="application/rss+xml" rel="self" href="http://online.wsj.com"/>
		<description>Markets</description>
		<language>en-us</language>
		<pubDate>{{ $now }}</pubDate>
		<lastBuildDate>{{ $now }}</lastBuildDate>
		<copyright>Dow Jones &amp; Company, Inc.</copyright>
		<generator>http://online.wsj.com</generator>
		<docs>http://cyber.law.harvard.edu/rss/rss.html</docs>
		<image>
			<title>WSJ.com: Markets</title>
			<link>http://online.wsj.com</link>
			<url>http://online.wsj.com/img/wsj_sm_logo.gif</url>
		</image>
		@foreach ($data as $row)
		<item>
			<title>{{ $row['title'] }}</title>
			<link>{{ $row['link'] }}</link>
			<description>
				<![CDATA[{{ $row['description'] }}]]>
			</description>
			<content:encoded/>
			<pubDate>{{ $row['date'] }}</pubDate>
			<guid isPermaLink="false"></guid>
			<category domain="AccessClassName"></category>
			<wsj:articletype>Foreign Exchange</wsj:articletype>
		</item>
		@endforeach
	</channel>
</rss>
